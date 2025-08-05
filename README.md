# 🤖 Chatbot Técnico con Rasa, Python y MySQL

Este proyecto es un chatbot técnico desarrollado con [Rasa](https://rasa.com/) que responde consultas sobre computadoras. El backend está implementado en Python y utiliza una base de datos MySQL. El frontend incluye un archivo PHP y HTML para interactuar con el bot desde una interfaz web.

---

## 📦 Requisitos previos

1. **Python 3.8 o superior** instalado
2. **Git** instalado
3. **MySQL** configurado si el bot accede a base de datos
4. **[Ollama](https://ollama.com/) instalado** (si usas modelos locales)
   ```bash
   ollama pull mistral:instruct
   ```

---

## ⚙️ Instalación

### 1. Clona este repositorio

```bash
git clone https://github.com/Valentindrap/chatbot-with-Rasa-and-Ollama.git
cd chatbot-with-Rasa-and-Ollama
```

### 2. Crea y activa un entorno virtual dentro de la carpeta chatbot-rasa

**Windows:**
```bash
python -m venv venv
venv\Scripts\activate
```

**macOS/Linux:**
```bash
python3 -m venv venv
source venv/bin/activate
```

### 3. Instala las dependencias

```bash
pip install -r requirements.txt
```

---

## 🧠 Entrenamiento del modelo

Antes de ejecutar el bot, entrena el modelo de Rasa:

```bash
cd chatbot-rasa
rasa train
```

Esto generará el modelo en la carpeta `models/`.

---

## 🚀 Ejecución del chatbot

### Ejecutar desde script (solo en Windows)

Ejecuta el archivo:
```bash
Inicializar Chatbot.bat
```

Este script lanza los servidores de Rasa y las acciones personalizadas.


---

## 🌐 Frontend web

Puedes usar el archivo `Index.html` junto con `chat.php` para conectar el frontend al bot.

---

## 🛠️ Estructura del proyecto

```
chatbot-rasa/
├── actions/            # Acciones personalizadas en Python
├── data/               # Intents, stories, nlu, rules
├── models/             # Modelos entrenados (ignorado en Git)
├── config.yml          # Configuración del pipeline
├── domain.yml          # Intents, entities, respuestas, slots
├── credentials.yml     # Canales (socket, REST, etc.)
├── endpoints.yml       # Servidor de acciones
```

---

## 🔒 Archivos ignorados en Git

El archivo `.gitignore` excluye automáticamente:

- Entorno virtual (`venv/`)
- Modelos (`models/`)
- Archivos de entrenamiento temporales (`.rasa/`)
- Base de datos (`db/`)
- Archivos cache y logs

---

## 📥 Archivo de dependencias (`requirements.txt`)

Este archivo contiene todas las dependencias necesarias para instalar el entorno correctamente con:

```bash
pip install -r requirements.txt
```

> ⚠️ Si agregas nuevas librerías al proyecto, no olvides actualizar el archivo con:
>
> ```bash
> pip freeze > requirements.txt
> ```

---

## 🧪 Enlace compartido (ChatGPT)

Este es un enlace con una versión de referencia:
[Compartido en ChatGPT](https://chatgpt.com/share/68917805-c89c-800a-9273-3b3dca86abbe)

---

## 🧑‍💻 Autor

Desarrollado por Agustin Casado, Angie Zapata, Agustin Rosseto y [Valentin Drapanti](https://github.com/Valentindrap).
