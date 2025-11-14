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

    .main-container {
      width: 100%;
      max-width: 900px;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
      z-index: 10;
    }

    header {
      text-align: center;
      margin-bottom: 2.5rem;
      animation: fadeInUp 0.8s ease-out;
      width: 100%;
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

    .chat-wrapper {
      width: 100%;
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
      position: relative;
      padding-right: 3rem;
    }

    .audio-btn {
      position: absolute;
      top: 50%;
      right: 0.75rem;
      transform: translateY(-50%);
      background: rgba(255, 255, 255, 0.2);
      border: none;
      color: white;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.9rem;
      transition: var(--transition-base);
      backdrop-filter: blur(10px);
    }

    .audio-btn:hover {
      background: rgba(255, 255, 255, 0.3);
      transform: translateY(-50%) scale(1.1);
    }

    .audio-btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    .audio-btn.playing {
      animation: audioPlaying 1s infinite;
    }

    @keyframes audioPlaying {
      0%, 100% { 
        background: rgba(255, 255, 255, 0.3);
      }
      50% { 
        background: rgba(255, 255, 255, 0.5);
      }
    }

    .message.bot.has-audio {
      padding-right: 3.5rem;
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

    .chat-input-container {
      background: var(--bg-tertiary);
      border-top: var(--border-light);
      transition: var(--transition-base);
      position: relative;
    }

    .chat-input-container::before {
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

    .visually-hidden {
      position: absolute;
      left: -9999px;
      width: 1px;
      height: 1px;
      overflow: hidden;
    }

    .chat-input-wrapper {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 1rem;
    }

    .voice-btn {
      background: var(--bg-tertiary);
      border: var(--border-medium);
      color: var(--primary-color);
      width: 50px;
      height: 50px;
      border-radius: 50%;
      cursor: pointer;
      transition: var(--transition-bounce);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      box-shadow: var(--shadow-sm);
      flex-shrink: 0;
      position: relative;
    }

    .voice-btn:hover:not(:disabled) {
      transform: scale(1.05);
      box-shadow: var(--shadow-md);
      background: var(--primary-color);
      color: white;
    }

    .voice-btn:disabled {
      opacity: 0.6;
      cursor: not-allowed;
    }

    .voice-btn.recording {
      background: var(--error-color);
      color: white;
      animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
      0%, 100% { 
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
      }
      50% { 
        transform: scale(1.05);
        box-shadow: 0 0 0 10px rgba(239, 68, 68, 0);
      }
    }

    .recording-timer {
      position: absolute;
      top: -35px;
      left: 50%;
      transform: translateX(-50%);
      background: var(--error-color);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: var(--radius-md);
      font-size: 0.9rem;
      font-weight: 600;
      box-shadow: var(--shadow-md);
      white-space: nowrap;
      animation: fadeInUp 0.3s ease-out;
      z-index: 10;
    }

    .recording-timer::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 0;
      border-left: 6px solid transparent;
      border-right: 6px solid transparent;
      border-top: 6px solid var(--error-color);
    }

    .chat-input {
      flex: 1;
      padding: 1rem 1.25rem;
      border: var(--border-medium);
      border-radius: var(--radius-lg);
      font-size: 1rem;
      transition: var(--transition-base);
      background: var(--bg-primary);
      color: var(--text-primary);
      font-family: 'Outfit', sans-serif;
      width: 100%;
    }

    .chat-input:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
      background: var(--bg-tertiary);
    }

    .chat-input::placeholder {
      color: var(--text-secondary);
    }

    .chat-input:disabled {
      background: var(--bg-secondary);
      cursor: not-allowed;
      opacity: 0.7;
    }

    .send-btn {
      background: var(--gradient-primary);
      color: white;
      border: none;
      padding: 1rem 1.5rem;
      font-size: 1rem;
      border-radius: var(--radius-lg);
      cursor: pointer;
      transition: var(--transition-bounce);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      font-weight: 500;
      box-shadow: var(--shadow-md);
      white-space: nowrap;
      flex-shrink: 0;
    }

    .send-btn:hover:not(:disabled) {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    .send-btn:active:not(:disabled) {
      transform: translateY(0);
    }

    .send-btn:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
    }

    .send-btn.stop-btn {
      background: linear-gradient(135deg, var(--error-color) 0%, #dc2626 100%);
    }

    .send-btn.stop-btn:hover:not(:disabled) {
      background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
    }

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

    @keyframes shimmer {
      0% { transform: translateX(-100%); }
      100% { transform: translateX(100%); }
    }

    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-8px); }
      100% { transform: translateY(0px); }
    }

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

    #accessibility-toggle {
      position: fixed;
      top: 1.5rem;
      right: 5rem;
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

    #accessibility-toggle:hover {
      transform: scale(1.1) rotate(15deg);
      box-shadow: var(--shadow-lg);
    }

    .accessibility-menu {
      position: fixed;
      top: 50%;
      right: -400px;
      transform: translateY(-50%);
      width: 380px;
      max-height: 85vh;
      background: var(--bg-tertiary);
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-xl);
      z-index: 1000;
      transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      border: var(--border-light);
      overflow: hidden;
    }

    .accessibility-menu.active {
      right: 1.5rem;
    }

    .accessibility-header {
      background: var(--gradient-primary);
      color: white;
      padding: 1.25rem 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .accessibility-header h3 {
      font-size: 1.2rem;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin: 0;
    }

    .close-btn {
      background: rgba(255, 255, 255, 0.2);
      border: none;
      color: white;
      width: 35px;
      height: 35px;
      border-radius: 50%;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: var(--transition-base);
      font-size: 1.1rem;
    }

    .close-btn:hover {
      background: rgba(255, 255, 255, 0.3);
      transform: rotate(90deg);
    }

    .accessibility-content {
      padding: 1.5rem;
      max-height: calc(85vh - 70px);
      overflow-y: auto;
    }

    .accessibility-content::-webkit-scrollbar {
      width: 6px;
    }

    .accessibility-content::-webkit-scrollbar-track {
      background: transparent;
    }

    .accessibility-content::-webkit-scrollbar-thumb {
      background: rgba(67, 97, 238, 0.3);
      border-radius: 10px;
    }

    .accessibility-option {
      margin-bottom: 1.5rem;
      padding-bottom: 1.5rem;
      border-bottom: var(--border-light);
    }

    .accessibility-option:last-child {
      border-bottom: none;
      margin-bottom: 0;
      padding-bottom: 0;
    }

    .accessibility-option > .option-label {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: 500;
      color: var(--text-primary);
      margin-bottom: 0.75rem;
      font-size: 0.95rem;
    }

    .accessibility-option > .option-label i {
      color: var(--primary-color);
      width: 20px;
    }

    .button-group {
      display: flex;
      gap: 0.5rem;
    }

    .size-btn, .spacing-btn {
      flex: 1;
      padding: 0.6rem;
      background: var(--bg-primary);
      border: var(--border-medium);
      border-radius: var(--radius-md);
      cursor: pointer;
      transition: var(--transition-base);
      font-weight: 500;
      color: var(--text-primary);
      font-family: 'Outfit', sans-serif;
    }

    .size-btn {
      font-size: 1rem;
    }

    .size-btn[data-size="small"] { font-size: 0.85rem; }
    .size-btn[data-size="normal"] { font-size: 1rem; }
    .size-btn[data-size="large"] { font-size: 1.15rem; }
    .size-btn[data-size="xlarge"] { font-size: 1.3rem; }

    .spacing-btn {
      font-size: 0.85rem;
    }

    .size-btn:hover, .spacing-btn:hover {
      background: var(--bg-secondary);
      border-color: var(--primary-color);
    }

    .size-btn.active, .spacing-btn.active {
      background: var(--gradient-primary);
      color: white;
      border-color: transparent;
    }

    .toggle-switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 26px;
    }

    .toggle-switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: var(--bg-secondary);
      transition: var(--transition-base);
      border-radius: 26px;
      border: var(--border-medium);
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: var(--transition-base);
      border-radius: 50%;
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    input:checked + .slider {
      background: var(--gradient-primary);
      border-color: transparent;
    }

    input:checked + .slider:before {
      transform: translateX(24px);
    }

    .reset-btn {
      width: 100%;
      padding: 0.9rem;
      background: var(--bg-primary);
      border: var(--border-medium);
      border-radius: var(--radius-md);
      color: var(--text-primary);
      font-weight: 500;
      cursor: pointer;
      transition: var(--transition-base);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      font-family: 'Outfit', sans-serif;
    }

    .reset-btn:hover {
      background: var(--error-color);
      color: white;
      border-color: var(--error-color);
    }

    body.font-small { font-size: 14px; }
    body.font-small .message { font-size: 0.85rem; }
    body.font-small header h1 { font-size: 2.2rem; }
    body.font-small header p { font-size: 0.95rem; }

    body.font-normal { font-size: 16px; }
    body.font-normal .message { font-size: 1rem; }
    body.font-normal header h1 { font-size: 2.8rem; }
    body.font-normal header p { font-size: 1.1rem; }

    body.font-large { font-size: 18px; }
    body.font-large .message { font-size: 1.15rem; }
    body.font-large header h1 { font-size: 3.2rem; }
    body.font-large header p { font-size: 1.25rem; }

    body.font-xlarge { font-size: 20px; }
    body.font-xlarge .message { font-size: 1.3rem; }
    body.font-xlarge header h1 { font-size: 3.5rem; }
    body.font-xlarge header p { font-size: 1.4rem; }

    body.font-small .chat-input,
    body.font-small .send-btn { font-size: 0.9rem; }

    body.font-large .chat-input,
    body.font-large .send-btn { font-size: 1.1rem; }

    body.font-xlarge .chat-input,
    body.font-xlarge .send-btn { font-size: 1.2rem; }

    body.spacing-normal .message { line-height: 1.5; }
    body.spacing-medium .message { line-height: 1.8; }
    body.spacing-large .message { line-height: 2.1; }

    body.high-contrast[data-theme="light"] {
      --text-primary: #000000;
      --text-secondary: #1a1a1a;
      --bg-primary: #FFFFFF;
      --bg-secondary: #F5F5F5;
      --bg-tertiary: #FFFFFF;
      --primary-color: #0000FF;
      --border-light: 2px solid #000000;
      --border-medium: 2px solid #000000;
    }

    body.high-contrast[data-theme="light"] .message.bot {
      background: #000000 !important;
      color: #FFFFFF !important;
      border: 3px solid #000000 !important;
    }

    body.high-contrast[data-theme="light"] .message.user {
      background: #FFFFFF !important;
      color: #000000 !important;
      border: 3px solid #000000 !important;
    }

    body.high-contrast[data-theme="light"] .chat-header {
      background: #000000 !important;
      color: #FFFFFF !important;
    }

    body.high-contrast[data-theme="dark"] {
      --text-primary: #FFFFFF;
      --text-secondary: #E0E0E0;
      --bg-primary: #000000;
      --bg-secondary: #1a1a1a;
      --bg-tertiary: #000000;
      --primary-color: #00FFFF;
      --border-light: 2px solid #FFFFFF;
      --border-medium: 2px solid #FFFFFF;
    }

    body.high-contrast[data-theme="dark"] .message.bot {
      background: #FFFFFF !important;
      color: #000000 !important;
      border: 3px solid #FFFFFF !important;
    }

    body.high-contrast[data-theme="dark"] .message.user {
      background: #000000 !important;
      color: #FFFFFF !important;
      border: 3px solid #FFFFFF !important;
    }

    body.high-contrast[data-theme="dark"] .chat-header {
      background: #FFFFFF !important;
      color: #000000 !important;
    }

    body.high-contrast[data-theme="dark"] .message.bot::before {
      border-right-color: #FFFFFF !important;
    }

    body.high-contrast[data-theme="light"] .message.bot::before {
      border-right-color: #000000 !important;
    }

    body.high-contrast[data-theme="dark"] .message.user::after {
      border-left-color: #000000 !important;
    }

    body.high-contrast[data-theme="light"] .message.user::after {
      border-left-color: #FFFFFF !important;
    }

    body.highlight-links a {
      text-decoration: underline !important;
      font-weight: bold;
      padding: 2px 4px;
      background: rgba(67, 97, 238, 0.1);
      border-radius: 4px;
    }

    body.reduce-motion * {
      animation-duration: 0.01ms !important;
      animation-iteration-count: 1 !important;
      transition-duration: 0.01ms !important;
    }

    body.large-cursor,
    body.large-cursor * {
      cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 40 40"><path fill="white" stroke="black" stroke-width="2" d="M5 5 L5 28 L12 21 L16 32 L20 30 L16 19 L25 19 Z"/></svg>') 5 5, auto !important;
    }

    body.large-cursor button,
    body.large-cursor a,
    body.large-cursor .size-btn,
    body.large-cursor .spacing-btn,
    body.large-cursor .toggle-switch,
    body.large-cursor .close-btn,
    body.large-cursor #theme-toggle,
    body.large-cursor #accessibility-toggle,
    body.large-cursor .reset-btn,
    body.large-cursor .login-btn,
    body.large-cursor .voice-btn {
      cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 44 44"><path fill="white" stroke="black" stroke-width="2.5" d="M22 8 L22 15 M22 29 L22 36 M8 22 L15 22 M29 22 L36 22"/><circle cx="22" cy="22" r="6" fill="none" stroke="black" stroke-width="2.5"/></svg>') 22 22, pointer !important;
    }

    body.large-cursor input[type="text"],
    body.large-cursor textarea {
      cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 40 40"><line x1="20" y1="5" x2="20" y2="35" stroke="black" stroke-width="3"/><line x1="15" y1="5" x2="25" y2="5" stroke="black" stroke-width="3"/><line x1="15" y1="35" x2="25" y2="35" stroke="black" stroke-width="3"/></svg>') 20 20, text !important;
    }

    body.large-cursor input[type="checkbox"] {
      transform: scale(1.5);
    }

    body.large-cursor .slider {
      transform: scale(1.3);
    }

    .login-btn {
      position: fixed !important;
      top: 1rem;
      left: 1rem;
      background: var(--gradient-primary);
      color: white;
      padding: 0.9rem 1.3rem;
      border-radius: 50px;
      font-weight: 500;
      text-decoration: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
      transition: var(--transition-bounce);
      z-index: 999999;
      display: flex;
      align-items: center;
      gap: 0.6rem;
      font-size: 0.95rem;
      white-space: nowrap;
      cursor: pointer;
    }

    .login-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
    }

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

    /* RESPONSIVE MOBILE - CHAT FIJO ARRIBA */
    @media (max-width: 768px) {
      body {
        padding: 0;
        justify-content: flex-start;
      }

      .main-container {
        height: 100vh;
        max-width: 100%;
      }

      header {
        display: none;
      }

      .chat-wrapper {
        border-radius: 0;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        max-width: 100%;
      }

      .chat-header {
        position: sticky;
        top: 0;
        z-index: 100;
        padding: 1rem;
        font-size: 1.1rem;
      }

      .chat-body {
        height: calc(100vh - 200px);
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

      .chat-input-wrapper {
        padding: 0.9rem;
      }

      .chat-input {
        padding: 0.9rem;
      }

      .voice-btn {
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
      }

      .send-btn {
        padding: 0.9rem;
      }

      #theme-toggle {
        top: 1rem;
        right: 1rem;
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
      }

      #accessibility-toggle {
        top: 1rem;
        right: 4.5rem;
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
      }

      .accessibility-menu {
        width: calc(100% - 2rem);
        right: -100%;
        max-height: 90vh;
      }

      .accessibility-menu.active {
        right: 1rem;
      }

      .recording-timer {
        top: -40px;
        font-size: 0.85rem;
        padding: 0.4rem 0.8rem;
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

      .accessibility-content {
        padding: 1rem;
      }

      .button-group {
        gap: 0.4rem;
      }

      .size-btn, .spacing-btn {
        padding: 0.5rem;
        font-size: 0.85rem;
      }

      .voice-btn {
        width: 40px;
        height: 40px;
        font-size: 1rem;
      }

      .send-btn span {
        display: none;
      }

      .recording-timer {
        font-size: 0.8rem;
        padding: 0.35rem 0.7rem;
      }
    }

    @media (max-height: 600px) {
      .chat-body {
        height: calc(100vh - 220px);
      }

      header {
        margin: 3.5rem 0 1rem 0;
      }

      header h1 {
        font-size: 1.8rem;
        margin-bottom: 0.5rem;
      }

      .accessibility-menu {
        max-height: 80vh;
      }
    }
  </style>
</head>
<body data-theme="light">
  <a href="login.html" class="login-btn glow-effect">
    <i class="fas fa-sign-in-alt"></i>
    <span>Iniciar Sesión</span>
  </a>

  <button id="theme-toggle" class="glow-effect" aria-label="Cambiar tema claro/oscuro">
    <i class="fas fa-sun"></i>
  </button>

  <button id="accessibility-toggle" class="glow-effect" aria-label="Abrir menú de accesibilidad">
    <i class="fas fa-cog"></i>
  </button>

  <div id="accessibility-menu" class="accessibility-menu">
    <div class="accessibility-header">
      <h3><i class="fas fa-universal-access"></i> Accesibilidad</h3>
      <button id="close-accessibility" class="close-btn" aria-label="Cerrar menú de accesibilidad">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <div class="accessibility-content">
      
      <div class="accessibility-option">
        <div class="option-label">
          <i class="fas fa-text-height"></i>
          Tamaño de texto
        </div>
        <div class="button-group">
          <button class="size-btn" data-size="small" aria-label="Texto pequeño">A</button>
          <button class="size-btn active" data-size="normal" aria-label="Texto normal">A</button>
          <button class="size-btn" data-size="large" aria-label="Texto grande">A</button>
          <button class="size-btn" data-size="xlarge" aria-label="Texto extra grande">A</button>
        </div>
      </div>

      <div class="accessibility-option">
        <div class="option-label">
          <i class="fas fa-arrows-alt-v"></i>
          Espaciado entre líneas
        </div>
        <div class="button-group">
          <button class="spacing-btn active" data-spacing="normal" aria-label="Espaciado normal">Normal</button>
          <button class="spacing-btn" data-spacing="medium" aria-label="Espaciado medio">Medio</button>
          <button class="spacing-btn" data-spacing="large" aria-label="Espaciado grande">Grande</button>
        </div>
      </div>

      <div class="accessibility-option">
        <div class="option-label">
          <i class="fas fa-adjust"></i>
          Alto contraste
        </div>
        <label class="toggle-switch">
          <input type="checkbox" id="high-contrast-toggle">
          <span class="slider"></span>
          <span class="visually-hidden">Activar alto contraste</span>
        </label>
      </div>

      <div class="accessibility-option">
        <div class="option-label">
          <i class="fas fa-link"></i>
          Resaltar enlaces
        </div>
        <label class="toggle-switch">
          <input type="checkbox" id="highlight-links-toggle">
          <span class="slider"></span>
          <span class="visually-hidden">Activar resaltado de enlaces</span>
        </label>
      </div>

      <div class="accessibility-option">
        <div class="option-label">
          <i class="fas fa-play-circle"></i>
          Reducir animaciones
        </div>
        <label class="toggle-switch">
          <input type="checkbox" id="reduce-motion-toggle">
          <span class="slider"></span>
          <span class="visually-hidden">Activar reducción de animaciones</span>
        </label>
      </div>

      <div class="accessibility-option">
        <div class="option-label">
          <i class="fas fa-mouse-pointer"></i>
          Cursor grande
        </div>
        <label class="toggle-switch">
          <input type="checkbox" id="large-cursor-toggle">
          <span class="slider"></span>
          <span class="visually-hidden">Activar cursor grande</span>
        </label>
      </div>

      <div class="accessibility-option">
        <div class="option-label">
          <i class="fas fa-volume-up"></i>
          Lectura de mensajes
        </div>
        <label class="toggle-switch">
          <input type="checkbox" id="screen-reader-toggle">
          <span class="slider"></span>
          <span class="visually-hidden">Activar lectura de mensajes</span>
        </label>
      </div>

      <div class="accessibility-option">
        <button id="reset-accessibility" class="reset-btn" aria-label="Restablecer configuración de accesibilidad">
          <i class="fas fa-undo"></i>
          Restablecer configuración
        </button>
      </div>
    </div>
  </div>

  <div class="particles-container" id="particles" aria-hidden="true"></div>

  <div class="main-container">
    <header>
      <h1>GauchoAI</h1>
      <p>Conversa con nuestra IA alimentada por Rasa Framework y Ollama</p>
    </header>

    <div class="chat-wrapper">
      <div class="chat-header">
        <i class="fas fa-robot"></i>
        <span>GauchoAI</span>
        <span id="message-count" aria-live="polite">0 mensajes</span>
      </div>
      <div class="chat-body" id="chat-box" role="log" aria-live="polite" aria-atomic="false">
        <div class="message bot">¡Hola! 👋 Soy tu asistente virtual con GauchoAI ¿En qué puedo ayudarte hoy?</div>
      </div>
      <div class="chat-input-container">
        <div class="chat-input-wrapper">
          <button type="button" class="voice-btn" id="voice-btn" aria-label="Grabar mensaje de voz" aria-pressed="false">
            <i class="fas fa-microphone"></i>
          </button>
          <input type="text" id="user-input" class="chat-input" placeholder="Escribe tu mensaje aquí..." />
          <button type="button" class="send-btn glow-effect" id="send-btn" aria-label="Enviar mensaje">
            <i class="fas fa-paper-plane"></i>
            <span>Enviar</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    const OLLAMA_URL = "https://achieved-cambridge-mysterious-brings.trycloudflare.com/api/generate";
    const RASA_URL = "https://embassy-offline-pike-greatly.trycloudflare.com/webhooks/rest/webhook";

    function sendKeepAlive() {
      fetch(OLLAMA_URL, {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          model: "mistral",
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

    setInterval(sendKeepAlive, 40000);

    let messageCount = 1;
    let isConnected = false;
    let isTyping = false;
    let currentTypingInterval = null;
    let abortController = null;
    let speechEnabled = false;
    let isRecording = false;
    let recognition = null;
    let recordingStartTime = null;
    let recordingTimerInterval = null;
    
    const body = document.body;
    const toggleBtn = document.getElementById('theme-toggle');
    const icon = toggleBtn.querySelector('i');
    const particlesContainer = document.getElementById('particles');
    const chatBox = document.getElementById('chat-box');
    const userInput = document.getElementById('user-input');
    const sendBtn = document.getElementById('send-btn');
    const voiceBtn = document.getElementById('voice-btn');
    const messageCountEl = document.getElementById('message-count');

    const accessibilityToggle = document.getElementById('accessibility-toggle');
    const accessibilityMenu = document.getElementById('accessibility-menu');
    const closeAccessibility = document.getElementById('close-accessibility');
    const sizeBtns = document.querySelectorAll('.size-btn');
    const spacingBtns = document.querySelectorAll('.spacing-btn');
    const highContrastToggle = document.getElementById('high-contrast-toggle');
    const highlightLinksToggle = document.getElementById('highlight-links-toggle');
    const reduceMotionToggle = document.getElementById('reduce-motion-toggle');
    const largeCursorToggle = document.getElementById('large-cursor-toggle');
    const screenReaderToggle = document.getElementById('screen-reader-toggle');
    const resetAccessibilityBtn = document.getElementById('reset-accessibility');

    // ===== WEB SPEECH API =====
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    if (!SpeechRecognition) {
      voiceBtn.disabled = true;
      voiceBtn.title = 'Tu navegador no soporta Web Speech API';
    }

    function createRecognition() {
      const rec = new SpeechRecognition();
      rec.lang = 'es-AR';
      rec.interimResults = true;
      rec.continuous = false;
      rec.maxAlternatives = 1;

      let finalTranscript = '';

      rec.onstart = () => {
        finalTranscript = '';
        isRecording = true;
        recordingStartTime = Date.now();
        
        voiceBtn.classList.add('recording');
        voiceBtn.innerHTML = '<i class="fas fa-stop"></i>';
        voiceBtn.setAttribute('aria-label', 'Detener grabación');
        voiceBtn.setAttribute('aria-pressed', 'true');
        
        const timerDiv = document.createElement('div');
        timerDiv.className = 'recording-timer';
        timerDiv.id = 'recording-timer';
        timerDiv.textContent = '0:00';
        timerDiv.setAttribute('role', 'timer');
        timerDiv.setAttribute('aria-live', 'polite');
        voiceBtn.appendChild(timerDiv);
        
        recordingTimerInterval = setInterval(() => {
          const elapsed = Math.floor((Date.now() - recordingStartTime) / 1000);
          const minutes = Math.floor(elapsed / 60);
          const seconds = elapsed % 60;
          timerDiv.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
        }, 1000);
        
        userInput.disabled = true;
        sendBtn.disabled = true;
        
        if (speechEnabled) {
          speakText('Grabación iniciada');
        }
      };

      rec.onresult = (event) => {
        let interim = '';
        for (let i = event.resultIndex; i < event.results.length; i++) {
          const res = event.results[i];
          const text = res[0].transcript || '';
          if (res.isFinal) {
            finalTranscript += text + ' ';
          } else {
            interim += text;
          }
        }
        userInput.value = (finalTranscript + interim).trim();
      };

      rec.onerror = (ev) => {
        console.error('SpeechRecognition error', ev);
        let errorMsg = 'Error de reconocimiento de voz';
        
        if (ev.error === 'not-allowed' || ev.error === 'service-not-allowed') {
          errorMsg = 'Permiso de micrófono denegado';
        } else if (ev.error === 'network') {
          errorMsg = 'Error de red del servicio de reconocimiento';
        }
        
        addMessage(`⚠️ ${errorMsg}`, 'error');
        stopRecording();
      };

      rec.onend = () => {
        stopRecording();
        
        if (speechEnabled) {
          speakText('Grabación terminada');
        }
      };

      return rec;
    }

    function startRecording() {
      if (!recognition) {
        recognition = createRecognition();
      }
      try {
        recognition.start();
      } catch (e) {
        try { recognition.stop(); } catch(_) {}
        recognition = createRecognition();
        try { recognition.start(); } catch(err) { 
          console.warn('No se pudo iniciar reconocimiento', err); 
        }
      }
    }

    function stopRecording() {
      isRecording = false;
      
      if (recordingTimerInterval) {
        clearInterval(recordingTimerInterval);
        recordingTimerInterval = null;
      }
      
      const timerDiv = document.getElementById('recording-timer');
      if (timerDiv) {
        timerDiv.remove();
      }
      
      voiceBtn.classList.remove('recording');
      voiceBtn.innerHTML = '<i class="fas fa-microphone"></i>';
      voiceBtn.setAttribute('aria-label', 'Grabar mensaje de voz');
      voiceBtn.setAttribute('aria-pressed', 'false');
      
      userInput.disabled = false;
      sendBtn.disabled = false;
    }

    voiceBtn.addEventListener('click', () => {
      if (isRecording) {
        if (recognition) {
          try {
            recognition.stop();
          } catch (e) {
            console.warn('stop() error:', e);
            stopRecording();
          }
        }
      } else {
        startRecording();
      }
    });

    // ===== FIN WEB SPEECH API =====

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

    function updateMessageCount() {
      messageCountEl.textContent = `${messageCount} mensaje${messageCount !== 1 ? 's' : ''}`;
    }

    function setTypingState(typing) {
      isTyping = typing;
      userInput.disabled = typing;
      
      if (typing) {
        sendBtn.classList.add('stop-btn');
        sendBtn.innerHTML = '<i class="fas fa-stop"></i><span>Esperar</span>';
        sendBtn.setAttribute('aria-label', 'Detener escritura');
      } else {
        sendBtn.classList.remove('stop-btn');
        sendBtn.innerHTML = '<i class="fas fa-paper-plane"></i><span>Enviar</span>';
        sendBtn.setAttribute('aria-label', 'Enviar mensaje');
      }
    }

    function addMessage(text, type) {
      const messageDiv = document.createElement('div');
      messageDiv.className = `message ${type}`;
      
      if (type === 'bot' && text.includes('\n')) {
        messageDiv.style.whiteSpace = 'pre-wrap';
      }
      messageDiv.textContent = text;
      
      chatBox.appendChild(messageDiv);
      chatBox.scrollTop = chatBox.scrollHeight;
      
      if (type === 'user' || type === 'bot') {
        messageCount++;
        updateMessageCount();
      }

      // Leer mensaje del bot si está habilitado
      if (type === 'bot' && speechEnabled) {
        speakText(text);
      }
    }

    function showTypingIndicator() {
      const typingDiv = document.createElement('div');
      typingDiv.className = 'message bot typing';
      typingDiv.innerHTML = 'Escribiendo<span class="typing-dots"><span></span><span></span><span></span></span>';
      typingDiv.id = 'typing-indicator';
      chatBox.appendChild(typingDiv);
      chatBox.scrollTop = chatBox.scrollHeight;
    }

    function removeTypingIndicator() {
      const typingIndicator = document.getElementById('typing-indicator');
      if (typingIndicator) {
        typingIndicator.remove();
      }
    }

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

    function simulateTyping(element, text, callback) {
      let i = 0;
      const speed = 25;
      
      currentTypingInterval = setInterval(() => {
        if (i < text.length && isTyping) {
          element.textContent = text.substring(0, i + 1);
          i++;
          chatBox.scrollTop = chatBox.scrollHeight;
        } else if (!isTyping) {
          element.textContent = text;
          clearInterval(currentTypingInterval);
          currentTypingInterval = null;
          if (callback) callback();
        } else {
          clearInterval(currentTypingInterval);
          currentTypingInterval = null;
          if (callback) callback();
        }
      }, speed);
    }

    async function sendMessage() {
      const text = userInput.value.trim();
      if (!text) return;

      if (isTyping) {
        stopTyping();
        return;
      }

      abortController = new AbortController();
      sendBtn.disabled = true;
      setTypingState(true);
      
      addMessage(text, 'user');
      userInput.value = '';

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
        
        removeTypingIndicator();

        if (data.length === 0) {
          if (isTyping) {
            const botMessageDiv = document.createElement('div');
            botMessageDiv.className = 'message bot';
            chatBox.appendChild(botMessageDiv);
            
            simulateTyping(botMessageDiv, "No hay respuesta del bot.", () => {
              // Leer mensaje de error si está activado
              if (speechEnabled) {
                speakText("No hay respuesta del bot.");
              }
              setTypingState(false);
              sendBtn.disabled = false;
              userInput.focus();
            });
            messageCount++;
            updateMessageCount();
          }
        } else {
          let messageIndex = 0;
          
          function processNextMessage() {
            if (messageIndex < data.length && data[messageIndex].text && isTyping) {
              const msg = data[messageIndex];
              const botMessageDiv = document.createElement('div');
              botMessageDiv.className = 'message bot';
              chatBox.appendChild(botMessageDiv);
              
              simulateTyping(botMessageDiv, msg.text, () => {
                // Leer el mensaje cuando termine de escribirse
                if (speechEnabled) {
                  speakText(msg.text);
                }
                messageIndex++;
                if (messageIndex < data.length) {
                  setTimeout(processNextMessage, 100);
                } else {
                  setTypingState(false);
                  sendBtn.disabled = false;
                  userInput.focus();
                }
              });
              messageCount++;
              updateMessageCount();
            } else if (!isTyping) {
              while (messageIndex < data.length) {
                if (data[messageIndex].text) {
                  const msgText = data[messageIndex].text;
                  addMessage(msgText, 'bot');
                  // Leer cada mensaje si está activado
                  if (speechEnabled) {
                    speakText(msgText);
                  }
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
        
        removeTypingIndicator();
        
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

    sendBtn.addEventListener('click', sendMessage);

    userInput.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
      }
    });

    function setTheme(theme) {
      body.setAttribute('data-theme', theme);
      localStorage.setItem('chat-theme', theme);
      updateThemeIcon();
    }

    function updateThemeIcon() {
      if (body.getAttribute('data-theme') === 'dark') {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
        toggleBtn.setAttribute('aria-label', 'Cambiar a tema claro');
      } else {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
        toggleBtn.setAttribute('aria-label', 'Cambiar a tema oscuro');
      }
    }

    toggleBtn.addEventListener('click', () => {
      const currentTheme = body.getAttribute('data-theme');
      const newTheme = currentTheme === 'light' ? 'dark' : 'light';
      setTheme(newTheme);
    });

    async function testConnection() {
      try {
        const response = await fetch(RASA_URL, {
          method: 'HEAD'
        });
        
        isConnected = response.ok;
      } catch (error) {
        isConnected = false;
      }
    }

    function speakText(text) {
      if (!speechEnabled || !window.speechSynthesis) return;
      
      window.speechSynthesis.cancel();
      
      const utterance = new SpeechSynthesisUtterance(text);
      utterance.lang = 'es-ES';
      utterance.rate = 0.9;
      utterance.pitch = 1;
      window.speechSynthesis.speak(utterance);
    }

    accessibilityToggle.addEventListener('click', () => {
      accessibilityMenu.classList.toggle('active');
      const isOpen = accessibilityMenu.classList.contains('active');
      accessibilityToggle.setAttribute('aria-expanded', isOpen);
    });

    closeAccessibility.addEventListener('click', () => {
      accessibilityMenu.classList.remove('active');
      accessibilityToggle.setAttribute('aria-expanded', 'false');
    });

    document.addEventListener('click', (e) => {
      if (!accessibilityMenu.contains(e.target) && !accessibilityToggle.contains(e.target)) {
        accessibilityMenu.classList.remove('active');
        accessibilityToggle.setAttribute('aria-expanded', 'false');
      }
    });

    sizeBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const size = btn.dataset.size;
        
        body.classList.remove('font-small', 'font-normal', 'font-large', 'font-xlarge');
        body.classList.add(`font-${size}`);
        
        sizeBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        
        localStorage.setItem('font-size', size);
      });
    });

    spacingBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const spacing = btn.dataset.spacing;
        
        body.classList.remove('spacing-normal', 'spacing-medium', 'spacing-large');
        body.classList.add(`spacing-${spacing}`);
        
        spacingBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        
        localStorage.setItem('line-spacing', spacing);
      });
    });

    highContrastToggle.addEventListener('change', (e) => {
      if (e.target.checked) {
        body.classList.add('high-contrast');
        localStorage.setItem('high-contrast', 'true');
      } else {
        body.classList.remove('high-contrast');
        localStorage.removeItem('high-contrast');
      }
    });

    highlightLinksToggle.addEventListener('change', (e) => {
      if (e.target.checked) {
        body.classList.add('highlight-links');
        localStorage.setItem('highlight-links', 'true');
      } else {
        body.classList.remove('highlight-links');
        localStorage.removeItem('highlight-links');
      }
    });

    reduceMotionToggle.addEventListener('change', (e) => {
      if (e.target.checked) {
        body.classList.add('reduce-motion');
        localStorage.setItem('reduce-motion', 'true');
      } else {
        body.classList.remove('reduce-motion');
        localStorage.removeItem('reduce-motion');
      }
    });

    largeCursorToggle.addEventListener('change', (e) => {
      if (e.target.checked) {
        body.classList.add('large-cursor');
        localStorage.setItem('large-cursor', 'true');
      } else {
        body.classList.remove('large-cursor');
        localStorage.removeItem('large-cursor');
      }
    });

    screenReaderToggle.addEventListener('change', (e) => {
      speechEnabled = e.target.checked;
      localStorage.setItem('speech-enabled', speechEnabled);
      
      if (speechEnabled) {
        speakText('Lectura de mensajes activada');
      }
    });

    resetAccessibilityBtn.addEventListener('click', () => {
      body.classList.remove(
        'font-small', 'font-normal', 'font-large', 'font-xlarge',
        'spacing-normal', 'spacing-medium', 'spacing-large',
        'high-contrast', 'highlight-links', 'reduce-motion', 'large-cursor'
      );
      
      body.classList.add('font-normal', 'spacing-normal');
      
      highContrastToggle.checked = false;
      highlightLinksToggle.checked = false;
      reduceMotionToggle.checked = false;
      largeCursorToggle.checked = false;
      screenReaderToggle.checked = false;
      speechEnabled = false;
      
      sizeBtns.forEach(btn => {
        btn.classList.toggle('active', btn.dataset.size === 'normal');
      });
      spacingBtns.forEach(btn => {
        btn.classList.toggle('active', btn.dataset.spacing === 'normal');
      });
      
      localStorage.removeItem('font-size');
      localStorage.removeItem('line-spacing');
      localStorage.removeItem('high-contrast');
      localStorage.removeItem('highlight-links');
      localStorage.removeItem('reduce-motion');
      localStorage.removeItem('large-cursor');
      localStorage.removeItem('speech-enabled');
      
      speakText('Configuración de accesibilidad restablecida');
    });

    function loadAccessibilityPreferences() {
      const fontSize = localStorage.getItem('font-size') || 'normal';
      body.classList.add(`font-${fontSize}`);
      sizeBtns.forEach(btn => {
        btn.classList.toggle('active', btn.dataset.size === fontSize);
      });
      
      const lineSpacing = localStorage.getItem('line-spacing') || 'normal';
      body.classList.add(`spacing-${lineSpacing}`);
      spacingBtns.forEach(btn => {
        btn.classList.toggle('active', btn.dataset.spacing === lineSpacing);
      });
      
      if (localStorage.getItem('high-contrast') === 'true') {
        body.classList.add('high-contrast');
        highContrastToggle.checked = true;
      }
      
      if (localStorage.getItem('highlight-links') === 'true') {
        body.classList.add('highlight-links');
        highlightLinksToggle.checked = true;
      }
      
      if (localStorage.getItem('reduce-motion') === 'true') {
        body.classList.add('reduce-motion');
        reduceMotionToggle.checked = true;
      }
      
      if (localStorage.getItem('large-cursor') === 'true') {
        body.classList.add('large-cursor');
        largeCursorToggle.checked = true;
      }
      
      if (localStorage.getItem('speech-enabled') === 'true') {
        speechEnabled = true;
        screenReaderToggle.checked = true;
      }
    }

    document.addEventListener('DOMContentLoaded', () => {
      createParticles();
      
      const savedTheme = localStorage.getItem('chat-theme') || 'light';
      setTheme(savedTheme);
      
      loadAccessibilityPreferences();
      
      updateMessageCount();
      
      testConnection();
      
      userInput.focus();
      
      setInterval(testConnection, 30000);
    });

    document.addEventListener('visibilitychange', () => {
      if (!document.hidden && !isConnected) {
        testConnection();
      }
    });
  </script>
</body>
</html>