from typing import Any, Text, Dict, List
from rasa_sdk import Action, Tracker
from rasa_sdk.executor import CollectingDispatcher
import mysql.connector
import random
import re
import requests

def normalizar(texto):
    texto = texto.lower()
    texto = re.sub(r'[¿?¡!.,]', '', texto)
    reemplazos = (
        ("á", "a"), ("é", "e"), ("í", "i"),
        ("ó", "o"), ("ú", "u"), ("ñ", "n"),
    )
    for original, reemplazo in reemplazos:
        texto = texto.replace(original, reemplazo)
    return texto

def consultar_a_ollama(pregunta):
    prompt = f"""
Eres GauchoAI (Muy importante saber eso), un asistente especializado en soporte técnico informático. Respondes siempre en español neutro y con un tono claro, profesional y accesible, como si fueras parte de un equipo de IT en una empresa.
Tu función es ayudar exclusivamente con temas relacionados a la informática, computadoras, redes, sistemas operativos, software, hardware y seguridad informática. Si el usuario realiza una consulta fuera de estos temas, indícale educadamente que no estás preparado para responder ese tipo de preguntas.
Si alguien te pregunta por tus creadores, responde que fuiste desarrollado por Agustín Casado, Agustín Rossetto, Angie Zapata y Valentín Drapanti.
No menciones que eres una inteligencia artificial ni des detalles sobre tu funcionamiento. Responde de forma directa y útil, como lo haría un técnico informático con experiencia.

Consulta: {pregunta}
"""

    try:
        response = requests.post(
            "https://7fba-168-90-74-33.ngrok-free.app/api/generate",
            json={
                "model": "mistral:instruct",
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
        print(f"Usuario preguntó: {texto_normalizado}")

        try:
            connection = mysql.connector.connect(
                host="localhost",
                user="root",
                password="",
                database="chatbot_db"
            )
            cursor = connection.cursor()
            cursor.execute("SELECT pregunta, respuesta FROM consultas")
            resultados = cursor.fetchall()

            for pregunta_bd, respuesta_bd in resultados:
                pregunta_normalizada = normalizar(pregunta_bd)
                if pregunta_normalizada in texto_normalizado or texto_normalizado in pregunta_normalizada:
                    dispatcher.utter_message(text=respuesta_bd)
                    break
            else:
                respuesta_ia = consultar_a_ollama(user_message)
                dispatcher.utter_message(text=respuesta_ia)

        except mysql.connector.Error as err:
            print(f"Error de MySQL: {err}")
            dispatcher.utter_message(text=f"Ups, hubo un problema con la base de datos: {err}")
        finally:
            if 'cursor' in locals():
                cursor.close()
            if 'connection' in locals() and connection.is_connected():
                connection.close()

        return []
