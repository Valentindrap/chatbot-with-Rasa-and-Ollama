# actions.py
from typing import Any, Text, Dict, List
from rasa_sdk import Action, Tracker
from rasa_sdk.executor import CollectingDispatcher
import mysql.connector
import re
import requests
from datetime import datetime

def normalizar(texto: str) -> str:
    texto = (texto or "").lower()
    texto = re.sub(r'[¿?¡!.,]', '', texto)
    reemplazos = (
        ("á", "a"), ("é", "e"), ("í", "i"),
        ("ó", "o"), ("ú", "u"), ("ñ", "n"),
    )
    for original, reemplazo in reemplazos:
        texto = texto.replace(original, reemplazo)
    texto = texto.strip()
    return texto

def consultar_a_ollama(pregunta: str) -> str:
    """
    Llama a Ollama (local) y devuelve la respuesta textual.
    Ajustá OLLAMA_URL y el modelo si lo tenés en otro puerto/nombre.
    """
    OLLAMA_URL = "http://localhost:11434/api/generate"  # endpoint que usás
    OLLAMA_MODEL = "gemma3"  # cambiá por el modelo que tengas
    prompt = f""" 
Eres GauchoAI (Muy importante saber eso), un asistente especializado en soporte técnico informático. Respondes siempre en español neutro y con un tono claro, profesional y accesible, como si fueras parte de un equipo de IT en una empresa.
Tu función es ayudar exclusivamente con temas relacionados a la informática, computadoras, redes, sistemas operativos, software, hardware y seguridad informática. Si el usuario realiza una consulta fuera de estos temas, indícale educadamente que no estás preparado para responder ese tipo de preguntas.
Si alguien te pregunta por tus creadores, responde que fuiste desarrollado por Agustín Casado, Agustín Rossetto, Angie Zapata y Valentín Drapanti.
No menciones que eres una inteligencia artificial ni des detalles sobre tu funcionamiento. Responde de forma directa y útil, como lo haría un técnico informático con experiencia.
Muy importante: Tus respuestas deben ser siempre en texto plano. No incluyas emojis, imágenes, enlaces, HTML ni ningún otro formato especial. Solo texto plano claro y bien redactado.

Consulta: {pregunta}
"""
    try:
        payload = {
            "model": OLLAMA_MODEL,
            "prompt": prompt,
            "stream": False
        }
        headers = {"Content-Type": "application/json"}
        resp = requests.post(OLLAMA_URL, json=payload, headers=headers, timeout=80)
        resp.raise_for_status()
        data = resp.json()

        # Extracción robusta de la respuesta (varias posibles estructuras)
        reply = None
        if isinstance(data, dict):
            # /api/generate suele devolver clave "response"
            reply = data.get("response")
            # algunos endpoints devuelven message -> content
            if not reply and "message" in data and isinstance(data["message"], dict):
                reply = data["message"].get("content")
            # otros pueden devolver "output" o "choices"
            if not reply and "output" in data:
                # output puede ser string o lista
                output = data["output"]
                if isinstance(output, str):
                    reply = output
                elif isinstance(output, list) and output:
                    # join si es lista de dicts/texto
                    items = []
                    for item in output:
                        if isinstance(item, dict) and "content" in item:
                            items.append(item["content"])
                        elif isinstance(item, str):
                            items.append(item)
                    reply = "\n".join(items).strip()
            if not reply and "choices" in data:
                choices = data["choices"]
                if isinstance(choices, list) and len(choices) > 0:
                    # intentar extraer texto de choices
                    first = choices[0]
                    if isinstance(first, dict):
                        reply = first.get("text") or first.get("message") or str(first)
                    else:
                        reply = str(first)

        # fallback: si no encontramos, transformar todo en texto
        if not reply:
            reply = str(data)

        # asegurarnos que sea texto plano y no vacío
        reply_text = (reply or "").strip()
        if not reply_text:
            return "⚠️ No pude generar una respuesta desde el motor de respuestas."
        return reply_text

    except Exception as e:
        return f"⚠️ Ocurrió un error al contactar con el motor de respuestas: {str(e)}"


class ActionResponderBD(Action):
    def name(self) -> Text:
        return "action_responder_bd"

    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:

        user_message = tracker.latest_message.get('text') or ""
        texto_normalizado = normalizar(user_message)
        print(f"[DEBUG] Pregunta normalizada: {texto_normalizado}")

        try:
            connection = mysql.connector.connect(
                host="localhost",
                user="root",
                password="",
                database="chatbot_22"
            )
            cursor = connection.cursor()

            cursor.execute("""
                SELECT p.pregunta, r.respuesta
                FROM preguntas p
                JOIN respuestas r ON p.id = r.pregunta_id
            """)
            resultados = cursor.fetchall()

            respuesta_final = None

            for pregunta_bd, respuesta_bd in resultados:
                pregunta_normalizada = normalizar(pregunta_bd)

                if (pregunta_normalizada == texto_normalizado or
                    pregunta_normalizada in texto_normalizado or
                    texto_normalizado in pregunta_normalizada):
                    respuesta_final = respuesta_bd
                    dispatcher.utter_message(text=respuesta_final)
                    break

            # Si no encontró coincidencias, preguntar a Ollama
            if not respuesta_final:
                respuesta_final = consultar_a_ollama(user_message)
                dispatcher.utter_message(text=respuesta_final)

            # Guardar conversación en base de datos
            fecha_hora = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
            cursor.execute("""
                INSERT INTO conversaciones (pregunta_usuario, respuesta_bot, fecha_hora)
                VALUES (%s, %s, %s)
            """, (user_message, respuesta_final, fecha_hora))
            connection.commit()

        except mysql.connector.Error as err:
            print(f"[ERROR] Error de MySQL: {err}")
            dispatcher.utter_message(text=f"⚠️ Hubo un problema con la base de datos: {err}")
        finally:
            try:
                if 'cursor' in locals() and cursor:
                    cursor.close()
                if 'connection' in locals() and connection.is_connected():
                    connection.close()
            except Exception:
                pass

        return []
