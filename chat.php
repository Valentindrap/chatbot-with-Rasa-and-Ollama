<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Asistente Virtual | IA del Futuro</title>
  <link rel="icon" href="src/img/logo.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Rajdhani:wght@500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    :root {
      --primary-hue: 230;
      --primary-saturation: 90%;
      --primary-lightness: 55%;
      --primary-color: hsl(var(--primary-hue), var(--primary-saturation), var(--primary-lightness));
      --primary-dark: hsl(var(--primary-hue), var(--primary-saturation), calc(var(--primary-lightness) - 10%));
      --primary-light: hsl(var(--primary-hue), var(--primary-saturation), calc(var(--primary-lightness) + 15%));
      
      --secondary-color: #6e44ff;
      --accent-color: #0ea5e9;
      --neon-accent: #00f2fe;
      
      --text-primary: #1e293b;
      --text-secondary: #64748b;
      
      --bg-primary: #f8fafc;
      --bg-secondary: #e2e8f0;
      --bg-tertiary: #ffffff;
      
      --success-color: #10b981;
      --warning-color: #f59e0b;
      --error-color: #ef4444;
      
      --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
      --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
      --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
      --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
      
      --glow-intensity: 10px;
      --glow-color: rgba(67, 97, 238, 0.5);
      
      --radius-sm: 6px;
      --radius-md: 12px;
      --radius-lg: 18px;
      --radius-xl: 24px;
      
      --transition-base: all 0.3s ease;
      --transition-smooth: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
      --transition-bounce: all 0.6s cubic-bezier(0.68, -0.55, 0.27, 1.55);
      
      --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
      --gradient-accent: linear-gradient(135deg, var(--accent-color) 0%, var(--neon-accent) 100%);
      --gradient-bg: linear-gradient(152deg, rgba(240,244,255,1) 0%, rgba(230,235,255,0.8) 100%);
      --gradient-chat: linear-gradient(167deg, rgba(255,255,255,0.95) 0%, rgba(248,250,252,0.98) 100%);
      
      --border-light: 1px solid rgba(0,0,0,0.08);
      --border-medium: 1px solid rgba(0,0,0,0.12);
    }

    [data-theme="dark"] {
      --text-primary: #f1f5f9;
      --text-secondary: #94a3b8;
      
      --bg-primary: #0f172a;
      --bg-secondary: #1e293b;
      --bg-tertiary: #1e293b;
      
      --gradient-bg: linear-gradient(152deg, rgba(15,23,42,1) 0%, rgba(30,41,59,0.9) 100%);
      --gradient-chat: linear-gradient(167deg, rgba(30,41,59,0.95) 0%, rgba(15,23,42,0.98) 100%);
      
      --shadow-sm: 0 1px 2px rgba(0,0,0,0.2);
      --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.3), 0 2px 4px -1px rgba(0,0,0,0.2);
      --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.3), 0 4px 6px -2px rgba(0,0,0,0.2);
      --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.3), 0 10px 10px -5px rgba(0,0,0,0.2);
      
      --border-light: 1px solid rgba(255,255,255,0.08);
      --border-medium: 1px solid rgba(255,255,255,0.12);
      
      --glow-color: rgba(99, 102, 241, 0.4);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Outfit', sans-serif;
      background: var(--gradient-bg);
      background-attachment: fixed;
      color: var(--text-primary);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 1.5rem;
      line-height: 1.6;
      transition: var(--transition-smooth);
      position: relative;
      overflow-x: hidden;
    }

    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        radial-gradient(circle at 15% 50%, rgba(99, 102, 241, 0.1) 0%, transparent 25%),
        radial-gradient(circle at 85% 30%, rgba(0, 242, 254, 0.08) 0%, transparent 25%),
        radial-gradient(circle at 50% 80%, rgba(110, 68, 255, 0.1) 0%, transparent 20%);
      z-index: -1;
      pointer-events: none;
    }

    /* Header Styles */
    header {
      text-align: center;
      margin-bottom: 2.5rem;
      animation: fadeInUp 0.8s ease-out;
      position: relative;
      z-index: 10;
      width: 100%;
      max-width: 900px;
      padding: 0 1rem;
    }

    header h1 {
      font-family: 'Rajdhani', sans-serif;
      font-size: 2.8rem;
      font-weight: 700;
      margin-bottom: 0.75rem;
      background: var(--gradient-primary);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      position: relative;
      display: inline-block;
      letter-spacing: -0.5px;
    }

    header h1::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: var(--gradient-accent);
      border-radius: 2px;
    }

    header p {
      font-size: 1.1rem;
      color: var(--text-secondary);
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.5;
    }

    /* Chat Wrapper */
    .chat-wrapper {
      width: 100%;
      max-width: 900px;
      background: var(--gradient-chat);
      border-radius: var(--radius-xl);
      box-shadow: 
        var(--shadow-lg),
        0 0 0 1px rgba(255, 255, 255, 0.1) inset;
      overflow: hidden;
      animation: slideUp 0.8s ease-out;
      backdrop-filter: blur(10px);
      border: var(--border-light);
      transition: var(--transition-smooth);
      position: relative;
      z-index: 10;
    }

    .chat-wrapper::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 1px;
      background: linear-gradient(90deg, 
        transparent, 
        rgba(67, 97, 238, 0.4), 
        transparent);
      z-index: 1;
    }

    /* Chat Header */
    .chat-header {
      background: var(--gradient-primary);
      color: white;
      padding: 1.25rem 1.5rem;
      font-size: 1.2rem;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      position: relative;
      overflow: hidden;
    }

    .chat-header::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(255, 255, 255, 0.2) 50%, 
        transparent 100%);
      transform: translateX(-100%);
      animation: shimmer 3s infinite;
    }

    .chat-header i {
      font-size: 1.4em;
      color: rgba(255, 255, 255, 0.9);
      filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.5));
    }

    /* Chat Body */
    .chat-body {
      height: 450px;
      overflow-y: auto;
      padding: 1.5rem;
      display: flex;
      flex-direction: column;
      gap: 1.25rem;
      background: 
        radial-gradient(circle at 100% 100%, rgba(67, 97, 238, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 0% 0%, rgba(110, 68, 255, 0.03) 0%, transparent 50%);
      transition: var(--transition-base);
      scroll-behavior: smooth;
    }

    /* Message Styles */
    .message {
      max-width: 80%;
      padding: 1rem 1.25rem;
      border-radius: var(--radius-lg);
      font-size: 1rem;
      line-height: 1.5;
      position: relative;
      animation: messageAppear 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      transition: var(--transition-base);
      word-wrap: break-word;
      box-shadow: var(--shadow-sm);
    }

    .message.user {
      background: var(--bg-tertiary);
      align-self: flex-end;
      border-bottom-right-radius: var(--radius-sm);
      color: var(--text-primary);
      box-shadow: 
        var(--shadow-sm),
        0 0 0 1px rgba(0,0,0,0.05) inset;
      margin-left: 20%;
    }

    .message.bot {
      background: var(--gradient-primary);
      color: white;
      align-self: flex-start;
      border-bottom-left-radius: var(--radius-sm);
      box-shadow: var(--shadow-md);
    }

    .message.bot::before {
      content: "";
      position: absolute;
      left: -10px;
      top: 12px;
      width: 0;
      height: 0;
      border: 8px solid transparent;
      border-right-color: var(--primary-color);
      border-left: 0;
    }

    .message.user::after {
      content: "";
      position: absolute;
      right: -10px;
      top: 12px;
      width: 0;
      height: 0;
      border: 8px solid transparent;
      border-left-color: var(--bg-tertiary);
      border-right: 0;
    }

    .message.error {
      background: rgba(239, 68, 68, 0.1);
      border-left: 4px solid var(--error-color);
      color: var(--error-color);
    }

    .message.connection-status {
      background: rgba(16, 185, 129, 0.1);
      border-left: 4px solid var(--success-color);
      color: var(--success-color);
      text-align: center;
      font-style: italic;
      margin: 0 auto;
    }

    /* Chat Input */
    .chat-input {
      display: flex;
      padding: 1rem;
      background: var(--bg-tertiary);
      border-top: var(--border-light);
      transition: var(--transition-base);
      position: relative;
    }

    .chat-input::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 1px;
      background: linear-gradient(90deg, 
        transparent, 
        rgba(67, 97, 238, 0.2), 
        transparent);
    }

    .chat-input input {
      flex: 1;
      padding: 1rem 1.25rem;
      border: var(--border-medium);
      border-radius: var(--radius-lg);
      font-size: 1rem;
      transition: var(--transition-base);
      background: var(--bg-primary);
      color: var(--text-primary);
      font-family: 'Outfit', sans-serif;
    }

    .chat-input input:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
      background: var(--bg-tertiary);
    }

    .chat-input input::placeholder {
      color: var(--text-secondary);
    }

    .chat-input input:disabled {
      background: var(--bg-secondary);
      cursor: not-allowed;
      opacity: 0.7;
    }

    .chat-input button {
      background: var(--gradient-primary);
      color: white;
      border: none;
      margin-left: 0.75rem;
      padding: 1rem 1.5rem;
      font-size: 1rem;
      border-radius: var(--radius-lg);
      cursor: pointer;
      transition: var(--transition-bounce);
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: 500;
      box-shadow: var(--shadow-md);
      white-space: nowrap;
    }

    .chat-input button:hover:not(:disabled) {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    .chat-input button:active:not(:disabled) {
      transform: translateY(0);
    }

    .chat-input button:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
    }

    /* Stop button styles */
    .chat-input button.stop-btn {
      background: linear-gradient(135deg, var(--error-color) 0%, #dc2626 100%);
    }

    .chat-input button.stop-btn:hover:not(:disabled) {
      background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
    }

    /* Animations */
    @keyframes fadeInUp {
      from { 
        opacity: 0; 
        transform: translateY(30px); 
      }
      to { 
        opacity: 1; 
        transform: translateY(0); 
      }
    }

    @keyframes slideUp {
      from { 
        opacity: 0; 
        transform: translateY(50px) scale(0.95); 
      }
      to { 
        opacity: 1; 
        transform: translateY(0) scale(1); 
      }
    }

    @keyframes messageAppear {
      from { 
        opacity: 0; 
        transform: translateY(20px) scale(0.95); 
      }
      to { 
        opacity: 1; 
        transform: translateY(0) scale(1); 
      }
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }

    @keyframes shimmer {
      0% { transform: translateX(-100%); }
      100% { transform: translateX(100%); }
    }

    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-8px); }
      100% { transform: translateY(0px); }
    }

    /* Scrollbar personalization */
    .chat-body::-webkit-scrollbar {
      width: 8px;
    }

    .chat-body::-webkit-scrollbar-track {
      background: transparent;
      border-radius: 10px;
      margin: 5px 0;
    }

    .chat-body::-webkit-scrollbar-thumb {
      background: rgba(67, 97, 238, 0.3);
      border-radius: 10px;
      transition: var(--transition-base);
    }

    .chat-body::-webkit-scrollbar-thumb:hover {
      background: rgba(67, 97, 238, 0.5);
    }

    [data-theme="dark"] .chat-body::-webkit-scrollbar-thumb {
      background: rgba(99, 102, 241, 0.4);
    }

    [data-theme="dark"] .chat-body::-webkit-scrollbar-thumb:hover {
      background: rgba(99, 102, 241, 0.6);
    }

    /* Typing indicator */
    .message.typing {
      font-style: italic;
      color: var(--text-secondary);
      background: transparent;
      box-shadow: none;
      font-size: 0.95rem;
      padding: 0.75rem 1rem;
    }

    .message.bot.typing::before,
    .message.user.typing::after {
      display: none;
    }

    .typing-dots {
      display: inline-flex;
      align-items: center;
      height: 1rem;
    }

    .typing-dots span {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: var(--text-secondary);
      display: inline-block;
      margin: 0 1px;
      animation: typingDots 1.4s infinite ease-in-out both;
    }

    .typing-dots span:nth-child(1) { animation-delay: -0.32s; }
    .typing-dots span:nth-child(2) { animation-delay: -0.16s; }

    @keyframes typingDots {
      0%, 80%, 100% { 
        transform: scale(0.8);
        opacity: 0.5;
      }
      40% { 
        transform: scale(1);
        opacity: 1;
      }
    }

    /* Theme Toggle Button */
    #theme-toggle {
      position: fixed;
      top: 1.5rem;
      right: 1.5rem;
      z-index: 999;
      background: var(--bg-tertiary);
      border: var(--border-light);
      font-size: 1.3rem;
      cursor: pointer;
      color: var(--primary-color);
      transition: var(--transition-bounce);
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: var(--shadow-md);
    }

    #theme-toggle:hover {
      transform: scale(1.1) rotate(15deg);
      box-shadow: var(--shadow-lg);
    }

    /* Login Button */
    .login-btn {
      position: absolute !important;
      top: 1rem;
      left: 1rem;
      background: var(--gradient-primary);
      color: white;
      padding: 0.7rem 1.1rem;
      border-radius: var(--radius-lg);
      font-weight: 500;
      text-decoration: none;
      box-shadow: var(--shadow-md);
      transition: var(--transition-bounce);
      z-index: 2000;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.95rem;
      white-space: nowrap;
    }

    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    /* Glow Effects */
    .glow-effect {
      position: relative;
      overflow: hidden;
    }

    .glow-effect::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      border-radius: inherit;
      box-shadow: 0 0 15px var(--glow-color);
      opacity: 0;
      transition: opacity 0.5s ease;
      z-index: -1;
    }

    .glow-effect:hover::before {
      opacity: 0.6;
    }

    /* Message Counter */
    #message-count {
      background: rgba(255, 255, 255, 0.2);
      padding: 0.35rem 0.75rem;
      border-radius: 20px;
      backdrop-filter: blur(10px);
      font-size: 0.85rem;
      margin-left: auto;
      font-weight: 500;
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    [data-theme="dark"] #message-count {
      background: rgba(0, 0, 0, 0.3);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Connection Status Indicator */
    .connection-indicator {
      position: absolute;
      right: 1rem;
      top: 50%;
      transform: translateY(-50%);
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background: var(--error-color);
      transition: var(--transition-base);
      z-index: 10;
    }

    .connection-indicator.connected {
      background: var(--success-color);
      box-shadow: 0 0 10px rgba(16, 185, 129, 0.5);
    }

    /* Particles/Stars Background */
    .particles-container {
      position: fixed;
      inset: 0;
      overflow: hidden;
      z-index: 0;
      pointer-events: none;
    }

    .particle {
      position: absolute;
      border-radius: 50%;
      background: var(--primary-color);
      opacity: 0;
      animation: float 8s ease-in-out infinite;
    }

    [data-theme="dark"] .particle {
      background: rgba(255, 255, 255, 0.8);
      box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
    }

    /* Media Queries para Responsive */
    @media (max-width: 768px) {
      body {
        padding: 1rem;
        justify-content: flex-start;
      }
      
      header {
        margin: 4.5rem 0 1.5rem 0;
      }
      
      header h1 {
        font-size: 2.2rem;
      }
      
      header p {
        font-size: 1rem;
        padding: 0 0.5rem;
      }
      
      .chat-wrapper {
        border-radius: var(--radius-lg);
      }
      
      .chat-header {
        padding: 1rem;
        font-size: 1.1rem;
      }
      
      .chat-body {
        height: calc(100vh - 240px);
        padding: 1.25rem;
        gap: 1rem;
      }
      
      .message {
        max-width: 85%;
        padding: 0.9rem 1.1rem;
        font-size: 0.95rem;
      }
      
      .message.bot::before {
        border-width: 7px;
        left: -8px;
      }
      
      .message.user::after {
        border-width: 7px;
        right: -8px;
      }
      
      .chat-input {
        padding: 0.9rem;
        flex-direction: column;
        gap: 0.75rem;
      }
      
      .chat-input input {
        padding: 0.9rem;
        width: 100%;
      }
      
      .chat-input button {
        margin-left: 0;
        padding: 0.9rem;
        width: 100%;
        justify-content: center;
      }
      
      #theme-toggle {
        top: 1rem;
        right: 1rem;
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
      }
      
      .login-btn {
        top: 1rem;
        left: 1rem;
        padding: 0.6rem 1rem;
        font-size: 0.9rem;
      }
    }

    @media (max-width: 480px) {
      header h1 {
        font-size: 1.9rem;
      }
      
      header p {
        font-size: 0.9rem;
      }
      
      .chat-header {
        font-size: 1rem;
      }
      
      .chat-header i {
        font-size: 1.1rem;
      }
      
      #message-count {
        font-size: 0.75rem;
        padding: 0.3rem 0.6rem;
      }
      
      .message {
        max-width: 90%;
        font-size: 0.9rem;
        padding: 0.8rem 1rem;
      }
      
      .login-btn span {
        display: none;
      }
      
      .login-btn {
        padding: 0.7rem;
        border-radius: 50%;
        font-size: 1.1rem;
        width: 45px;
        height: 45px;
        justify-content: center;
      }
    }

    @media (max-height: 600px) {
      .chat-body {
        height: calc(100vh - 200px);
      }
      
      header {
        margin: 3.5rem 0 1rem 0;
      }
      
      header h1 {
        font-size: 1.8rem;
        margin-bottom: 0.5rem;
      }
    }
  </style>
</head>
<script>
  // URL del endpoint de Ollama (ajustá a tu configuración real)
  const OLLAMA_URL = "http://localhost:11434/api/generate";

  // Mensaje de keep-alive
  function sendKeepAlive() {
    fetch(OLLAMA_URL, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({
        model: "mistral", // o el modelo que uses
        messages: [{ role: "user", content: "ping" }],
        stream: false
      })
    })
    .then(res => res.json())
    .then(data => {
      console.log("Keep-alive enviado:", data);
    })
    .catch(err => {
      console.error("Error en keep-alive:", err);
    });
  }

  // Enviar cada 50 segundos
  setInterval(sendKeepAlive, 40000);
</script>

<body data-theme="light">
  <a href="login.html" class="login-btn glow-effect">
    <i class="fas fa-sign-in-alt"></i>
    <span>Iniciar Sesión</span>
  </a>

  <header>
    <h1>GauchoAI</h1>
    <p>Conversa con nuestra IA alimentada por Rasa Framework y Ollama</p>
  </header>

  <button id="theme-toggle" class="glow-effect">
    <i class="fas fa-sun"></i>
  </button>

  <div class="particles-container" id="particles"></div>

  <div class="chat-wrapper">
    <div class="chat-header">
      <i class="fas fa-robot"></i>
      <span>GauchoAI</span>
      <span id="message-count">0 mensajes</span>

    </div>
    <div class="chat-body" id="chat-box">
      <div class="message bot">¡Hola! 👋 Soy tu asistente virtual con GauchoAI ¿En qué puedo ayudarte hoy?</div>
    </div>
    <form class="chat-input" id="chat-form">
      <input type="text" id="user-input" placeholder="Escribe tu mensaje aquí..." required />
      <button type="submit" class="glow-effect" id="send-btn">
        <i class="fas fa-paper-plane"></i>
        <span>Enviar</span>
      </button>
    </form>
  </div>
  <script>
    // Variables globales
    let messageCount = 1;
    let isConnected = false;
    let isTyping = false;
    let currentTypingInterval = null;
    let abortController = null;
    const RASA_URL = "http://localhost:5005/webhooks/rest/webhook";
    
    // Elementos DOM
    const body = document.body;
    const toggleBtn = document.getElementById('theme-toggle');
    const icon = toggleBtn.querySelector('i');
    const particlesContainer = document.getElementById('particles');
    const chatBox = document.getElementById('chat-box');
    const chatForm = document.getElementById('chat-form');
    const userInput = document.getElementById('user-input');
    const sendBtn = document.getElementById('send-btn');
    const messageCountEl = document.getElementById('message-count');
    const connectionStatus = document.getElementById('connection-status');

    // Crear partículas de fondo
    function createParticles() {
      const particleCount = 50;
      for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 100}%`;
        particle.style.width = `${2 + Math.random() * 3}px`;
        particle.style.height = particle.style.width;
        particle.style.animationDuration = `${8 + Math.random() * 12}s`;
        particle.style.animationDelay = `${Math.random() * 5}s`;
        particle.style.opacity = `${0.2 + Math.random() * 0.5}`;
        particlesContainer.appendChild(particle);
      }
    }

    // Actualizar contador de mensajes
    function updateMessageCount() {
      messageCountEl.textContent = `${messageCount} mensaje${messageCount !== 1 ? 's' : ''}`;
    }

    // Actualizar estado de conexión

    // Controlar UI durante escritura
    function setTypingState(typing) {
      isTyping = typing;
      userInput.disabled = typing;
      
      if (typing) {
        sendBtn.classList.add('stop-btn');
        sendBtn.innerHTML = '<i class="fas fa-stop"></i><span>Esperar</span>';
      } else {
        sendBtn.classList.remove('stop-btn');
        sendBtn.innerHTML = '<i class="fas fa-paper-plane"></i><span>Enviar</span>';
      }
    }

    // Agregar mensaje al chat
    function addMessage(text, type) {
      const messageDiv = document.createElement('div');
      messageDiv.className = `message ${type}`;
      
      // Usar textContent para evitar inyección HTML, excepto para mensajes del bot que pueden tener formato
      if (type === 'bot' && text.includes('\n')) {
        // Preservar saltos de línea en respuestas del bot
        messageDiv.style.whiteSpace = 'pre-wrap';
      }
      messageDiv.textContent = text;
      
      chatBox.appendChild(messageDiv);
      chatBox.scrollTop = chatBox.scrollHeight;
      
      if (type === 'user' || type === 'bot') {
        messageCount++;
        updateMessageCount();
      }
    }

    // Mostrar indicador de escritura
    function showTypingIndicator() {
      const typingDiv = document.createElement('div');
      typingDiv.className = 'message bot typing';
      typingDiv.innerHTML = 'Escribiendo<span class="typing-dots"><span></span><span></span><span></span></span>';
      typingDiv.id = 'typing-indicator';
      chatBox.appendChild(typingDiv);
      chatBox.scrollTop = chatBox.scrollHeight;
    }

    // Remover indicador de escritura
    function removeTypingIndicator() {
      const typingIndicator = document.getElementById('typing-indicator');
      if (typingIndicator) {
        typingIndicator.remove();
      }
    }

    // Detener escritura actual
    function stopTyping() {
      if (currentTypingInterval) {
        clearInterval(currentTypingInterval);
        currentTypingInterval = null;
      }
      
      if (abortController) {
        abortController.abort();
        abortController = null;
      }
      
      removeTypingIndicator();
      setTypingState(false);
      sendBtn.disabled = false;
      userInput.focus();
    }

    // Simular escritura del bot (interruptible)
    function simulateTyping(element, text, callback) {
      let i = 0;
      const speed = 25;
      
      currentTypingInterval = setInterval(() => {
        if (i < text.length && isTyping) {
          element.textContent = text.substring(0, i + 1);
          i++;
          chatBox.scrollTop = chatBox.scrollHeight;
        } else if (!isTyping) {
          // Si se detuvo, mostrar el texto completo inmediatamente
          element.textContent = text;
          clearInterval(currentTypingInterval);
          currentTypingInterval = null;
          if (callback) callback();
        } else {
          // Terminó de escribir normalmente
          clearInterval(currentTypingInterval);
          currentTypingInterval = null;
          if (callback) callback();
        }
      }, speed);
    }

    // Enviar mensaje
    async function sendMessage() {
      const text = userInput.value.trim();
      if (!text) return;

      // Si está escribiendo, detener
      if (isTyping) {
        stopTyping();
        return;
      }

      // Crear AbortController para poder cancelar la petición
      abortController = new AbortController();

      // Deshabilitar el botón de envío y cambiar a modo "escribiendo"
      sendBtn.disabled = true;
      setTypingState(true);
      
      // Agregar mensaje del usuario
      addMessage(text, 'user');
      userInput.value = '';

      // Mostrar indicador de escritura
      showTypingIndicator();

      try {
        const response = await fetch(RASA_URL, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ sender: 'usuario', message: text }),
          signal: abortController.signal
        });

        if (!response.ok) {
          throw new Error(`HTTP ${response.status}: ${response.statusText}`);
        }

        const data = await response.json();
        
        // Remover indicador de escritura
        removeTypingIndicator();
        
        // Actualizar estado de conexión


        if (data.length === 0) {
          if (isTyping) {
            const botMessageDiv = document.createElement('div');
            botMessageDiv.className = 'message bot';
            chatBox.appendChild(botMessageDiv);
            
            simulateTyping(botMessageDiv, "No hay respuesta del bot.", () => {
              setTypingState(false);
              sendBtn.disabled = false;
              userInput.focus();
            });
            messageCount++;
            updateMessageCount();
          }
        } else {
          // Procesar todas las respuestas del bot
          let messageIndex = 0;
          
          function processNextMessage() {
            if (messageIndex < data.length && data[messageIndex].text && isTyping) {
              const msg = data[messageIndex];
              const botMessageDiv = document.createElement('div');
              botMessageDiv.className = 'message bot';
              chatBox.appendChild(botMessageDiv);
              
              simulateTyping(botMessageDiv, msg.text, () => {
                messageIndex++;
                if (messageIndex < data.length) {
                  setTimeout(processNextMessage, 100); // Pequeña pausa entre mensajes
                } else {
                  setTypingState(false);
                  sendBtn.disabled = false;
                  userInput.focus();
                }
              });
              messageCount++;
              updateMessageCount();
            } else if (!isTyping) {
              // Si se detuvo, procesar mensajes restantes sin animación
              while (messageIndex < data.length) {
                if (data[messageIndex].text) {
                  addMessage(data[messageIndex].text, 'bot');
                }
                messageIndex++;
              }
              setTypingState(false);
              sendBtn.disabled = false;
              userInput.focus();
            } else {
              setTypingState(false);
              sendBtn.disabled = false;
              userInput.focus();
            }
          }
          
          processNextMessage();
        }
      } catch (error) {
        if (error.name === 'AbortError') {
          console.log('Petición cancelada por el usuario');
          removeTypingIndicator();
          setTypingState(false);
          sendBtn.disabled = false;
          userInput.focus();
          return;
        }
        
        console.error('Error al conectar con Rasa:', error);
        
        // Remover indicador de escritura
        removeTypingIndicator();
        
        // Actualizar estado de conexión
        updateConnectionStatus(false);
        
        // Mostrar mensaje de error específico
        let errorMessage = "Error al conectar con el chatbot.";
        if (error.name === 'TypeError' && error.message.includes('fetch')) {
          errorMessage = "⚠️ No se pudo conectar con el servidor Rasa. Verifica que esté ejecutándose en " + RASA_URL;
        } else if (error.message.includes('HTTP')) {
          errorMessage = `⚠️ Error del servidor: ${error.message}`;
        }
        
        if (isTyping) {
          const errorDiv = document.createElement('div');
          errorDiv.className = 'message error';
          chatBox.appendChild(errorDiv);
          
          simulateTyping(errorDiv, errorMessage, () => {
            setTypingState(false);
            sendBtn.disabled = false;
            userInput.focus();
          });
        } else {
          addMessage(errorMessage, 'error');
          setTypingState(false);
          sendBtn.disabled = false;
          userInput.focus();
        }
      } finally {
        abortController = null;
      }
    }

    // Event listeners
    chatForm.addEventListener('submit', (e) => {
      e.preventDefault();
      sendMessage();
    });

    userInput.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
      }
    });

    // Sistema de temas
    function setTheme(theme) {
      body.setAttribute('data-theme', theme);
      localStorage.setItem('chat-theme', theme);
      updateThemeIcon();
    }

    function updateThemeIcon() {
      if (body.getAttribute('data-theme') === 'dark') {
        icon.classList.replace('fa-sun', 'fa-moon');
      } else {
        icon.classList.replace('fa-moon', 'fa-sun');
      }
    }

    toggleBtn.addEventListener('click', () => {
      const currentTheme = body.getAttribute('data-theme');
      const newTheme = currentTheme === 'light' ? 'dark' : 'light';
      setTheme(newTheme);
    });

    // Test de conexión inicial (solo verifica disponibilidad del endpoint)
    async function testConnection() {
      try {
        const response = await fetch(RASA_URL, {
          method: 'HEAD'
        });
        
        updateConnectionStatus(response.ok);
      } catch (error) {
        updateConnectionStatus(false);
      }
    }

    // Inicialización
    document.addEventListener('DOMContentLoaded', () => {
      // Crear partículas
      createParticles();
      
      // Cargar tema guardado
      const savedTheme = localStorage.getItem('chat-theme') || 'light';
      setTheme(savedTheme);
      
      // Actualizar contador inicial
      updateMessageCount();
      
      // Test de conexión inicial
      testConnection();
      
      // Enfocar el input
      userInput.focus();
      
      // Test de conexión periódico cada 30 segundos
      setInterval(testConnection, 30000);
    });

    // Manejar visibilidad de la página para reconectar cuando sea necesario
    document.addEventListener('visibilitychange', () => {
      if (!document.hidden && !isConnected) {
        testConnection();
      }
    });
  </script>
</body>
</html>