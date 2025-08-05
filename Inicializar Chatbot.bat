@echo off
setlocal

:: Ruta absoluta del proyecto
set PROYECTO_PATH=C:\xampp\htdocs\chatbot\chatbot-rasa

:: Ir a la carpeta del proyecto
cd /d %PROYECTO_PATH%

:: Abrir terminal con Rasa server
start cmd /k "cd /d %PROYECTO_PATH% && call venv\Scripts\activate && rasa run -i localhost --enable-api --cors "*" --debug"

:: Abrir terminal con servidor de acciones
start cmd /k "cd /d %PROYECTO_PATH% && call venv\Scripts\activate && rasa run actions"

:: Abrir terminal con Ollama (sin entorno virtual)
::start cmd /k "ollama run mistral:instruct"

exit