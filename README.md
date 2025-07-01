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
git clone https://github.com/tu-usuario/tu-repo.git
cd tu-repo
```

### 2. Crea y activa un entorno virtual

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

### Opción 1: Ejecutar desde script (solo en Windows)

Ejecuta el archivo:
```bash
Inicializar Chatbot.bat
```

Este script lanza los servidores de Rasa y las acciones personalizadas.

### Opción 2: Manualmente desde terminal

```bash
cd chatbot-rasa

# Terminal 1: Servidor principal de Rasa
rasa run

# Terminal 2: Servidor de acciones
rasa run actions
```

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
[Compartido en ChatGPT](https://chatgpt.com/share/686362cb-616c-800a-b3f6-d3e709663ba4)

---

## 🧑‍💻 Autor

Desarrollado con 💻 usando Rasa, Python y MySQL.
