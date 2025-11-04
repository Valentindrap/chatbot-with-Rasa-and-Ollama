# telegram_bridge.py
import logging
import requests
from telegram.ext import Updater, MessageHandler, Filters

# ----- CONFIG -----
TELEGRAM_TOKEN = "8497052964:AAG7QKloexb0A6ZRDvRgujCpzkoVaAIQaCo"
RASA_REST_URL = "http://localhost:5005/webhooks/rest/webhook"
# ------------------

logging.basicConfig(level=logging.INFO)
logger = logging.getLogger(__name__)

def forward_to_rasa_and_reply(update, context):
    user_text = update.message.text or ""
    chat_id = str(update.effective_chat.id)

    payload = {"sender": chat_id, "message": user_text}
    try:
        resp = requests.post(RASA_REST_URL, json=payload, timeout=15)
        if resp.status_code == 200:
            replies = resp.json()
            if not replies:
                context.bot.send_message(chat_id=update.effective_chat.id,
                                         text="Perdón, no tengo una respuesta en este momento.")
            else:
                for item in replies:
                    text = item.get("text") or ""
                    if text:
                        context.bot.send_message(chat_id=update.effective_chat.id, text=text)
        else:
            context.bot.send_message(chat_id=update.effective_chat.id,
                                     text=f"Error al conectar con Rasa ({resp.status_code}).")
            logger.error("Rasa returned %s: %s", resp.status_code, resp.text)
    except Exception as e:
        logger.exception("Error contactando a Rasa")
        context.bot.send_message(chat_id=update.effective_chat.id,
                                 text=f"Error conectando con el servidor de Rasa: {e}")

def main():
    updater = Updater(TELEGRAM_TOKEN, use_context=True)
    dp = updater.dispatcher
    dp.add_handler(MessageHandler(Filters.text & ~Filters.command, forward_to_rasa_and_reply))
    updater.start_polling()   # inicia polling
    logger.info("Bridge Telegram->Rasa iniciado. Polling activo.")
    updater.idle()

if __name__ == "__main__":
    main()
