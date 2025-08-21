from typing import Any, Text, Dict, List
from rasa_sdk import Action, Tracker
from rasa_sdk.executor import CollectingDispatcher
import mysql.connector
import re
import requests
from datetime import datetime

def normalizar(texto: str) -> str:
    texto = texto.lower()
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
    prompt = f"""
Eres GauchoAI (Muy importante saber eso), un asistente especializado en soporte técnico informático. Respondes siempre en español neutro y con un tono claro, profesional y accesible, como si fueras parte de un equipo de IT en una empresa.
Tu función es ayudar exclusivamente con temas relacionados a la informática, computadoras, redes, sistemas operativos, software, hardware y seguridad informática. Si el usuario realiza una consulta fuera de estos temas, indícale educadamente que no estás preparado para responder ese tipo de preguntas.
Si alguien te pregunta por tus creadores, responde que fuiste desarrollado por Agustín Casado, Agustín Rossetto, Angie Zapata y Valentín Drapanti.
No menciones que eres una inteligencia artificial ni des detalles sobre tu funcionamiento. Responde de forma directa y útil, como lo haría un técnico informático con experiencia.

Consulta: {pregunta}
"""
    try:
        response = requests.post(
            "https://6389f7ef0ccd.ngrok-free.app/api/generate",  # O cambiá por tu proxy ngrok si estás usando uno
            json={
                "model": "mistral",   # Usá el modelo que tengas cargado en Ollama
                "prompt": prompt,
                "stream": False
            },
            timeout=25
        )
        if response.status_code == 200:
            return response.json().get("response", "").strip()
        else:
            return "⚠️ No pude obtener una respuesta técnica. ¿Querés intentar otra vez?"
    except Exception as e:
        return f"⚠️ Ocurrió un error al contactar con el motor de respuestas: {str(e)}"

class ActionResponderBD(Action):
    def name(self) -> Text:
        return "action_responder_bd"

    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:

        user_message = tracker.latest_message.get('text')
        texto_normalizado = normalizar(user_message)
        print(f"[DEBUG] Pregunta normalizada: {texto_normalizado}")

        try:
            connection = mysql.connector.connect(
                host="localhost",
                user="root",
                password="",
                database="chatbot_2"
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
            if 'cursor' in locals():
                cursor.close()
            if 'connection' in locals() and connection.is_connected():
                connection.close()

        return []
