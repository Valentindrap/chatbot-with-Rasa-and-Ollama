<?php include("src/php/check_session.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gaucho AI - Panel de Control</title>
  <link rel="icon" href="src/img/logo.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-hue: 225;
      --primary-saturation: 100%;
      --primary-lightness: 60%;
      --primary-color: hsl(var(--primary-hue), var(--primary-saturation), var(--primary-lightness));
      --primary-dark: hsl(var(--primary-hue), var(--primary-saturation), calc(var(--primary-lightness) - 10%));
      --primary-light: hsl(var(--primary-hue), var(--primary-saturation), calc(var(--primary-lightness) + 20%));
      
      --accent-hue: 190;
      --accent-color: hsl(var(--accent-hue), 90%, 55%);
      --neon-color: #00f2fe;
      
      --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
      --gradient-dark: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
      --gradient-card: linear-gradient(145deg, rgba(255,255,255,0.12) 0%, rgba(255,255,255,0.05) 100%);
      --gradient-glass: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
      
      --text-primary: #0f172a;
      --text-secondary: #475569;
      --text-light: #64748b;
      
      --bg-primary: #f8fafc;
      --bg-secondary: #e2e8f0;
      --bg-tertiary: #ffffff;
      
      --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
      --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
      --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
      --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
      --shadow-neon: 0 0 10px rgba(28, 96, 253, 0.5), 0 0 20px rgba(28, 96, 253, 0.3);
      
      --border-radius-sm: 8px;
      --border-radius-md: 12px;
      --border-radius-lg: 16px;
      --border-radius-xl: 24px;
      
      --transition-base: all 0.3s ease;
      --transition-smooth: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
      --transition-bounce: all 0.6s cubic-bezier(0.68, -0.55, 0.27, 1.55);
      
      --glass-border: 1px solid rgba(255, 255, 255, 0.1);
      --glass-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.15);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Outfit', sans-serif;
      background: var(--bg-primary);
      color: var(--text-primary);
      padding: 2rem 1rem;
      min-height: 100vh;
      transition: var(--transition-base);
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
        radial-gradient(circle at 15% 50%, rgba(99, 102, 241, 0.08) 0%, transparent 25%),
        radial-gradient(circle at 85% 30%, rgba(0, 242, 254, 0.06) 0%, transparent 25%),
        radial-gradient(circle at 50% 80%, rgba(110, 68, 255, 0.08) 0%, transparent 20%);
      z-index: -2;
      pointer-events: none;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      position: relative;
    }

    /* Header Styles */
    header {
      text-align: center;
      margin-bottom: 3rem;
      padding: 2rem 1rem;
      background: var(--gradient-glass);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-radius: var(--border-radius-xl);
      border: var(--glass-border);
      box-shadow: var(--glass-shadow);
      position: relative;
      overflow: hidden;
    }

    header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(255, 255, 255, 0.2) 50%, 
        transparent 100%);
      transform: translateX(-100%);
      animation: shimmer 3s infinite;
    }

    header h1 {
      font-family: 'Rajdhani', sans-serif;
      font-size: 2.8rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
      background: var(--gradient-primary);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      position: relative;
      display: inline-block;
    }

    header h1::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 4px;
      background: var(--gradient-primary);
      border-radius: 2px;
    }

    header p {
      font-size: 1.2rem;
      color: var(--text-secondary);
      max-width: 600px;
      margin: 0 auto;
    }

    /* Logout Button */
    .logout {
      position: absolute;
      top: 0;
      right: 0;
      z-index: 10;
    }

    .logout a {
      background: var(--gradient-primary);
      color: white;
      padding: 0.8rem 1.5rem;
      border-radius: var(--border-radius-lg);
      text-decoration: none;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      box-shadow: var(--shadow-md);
      transition: var(--transition-bounce);
      position: relative;
      overflow: hidden;
    }

    .logout a::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, var(--primary-dark) 0%, var(--accent-color) 100%);
      opacity: 0;
      transition: var(--transition-base);
      z-index: -1;
    }

    .logout a:hover {
      transform: translateY(-3px);
      box-shadow: var(--shadow-lg), var(--shadow-neon);
    }

    .logout a:hover::before {
      opacity: 1;
    }

    /* Section Headers */
    h2 {
      font-family: 'Rajdhani', sans-serif;
      font-size: 1.8rem;
      margin: 3rem 0 1.5rem;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      background: var(--gradient-primary);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      padding: 0.5rem 0;
      position: relative;
    }

    h2::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 60px;
      height: 3px;
      background: var(--gradient-primary);
      border-radius: 2px;
    }

    h2 i {
      font-size: 1.4rem;
    }

    /* Menu Grid */
    .menu {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
      gap: 1.5rem;
      margin-bottom: 3rem;
    }

    .menu a {
      padding: 2rem 1.5rem;
      background: var(--gradient-card);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      color: var(--text-primary);
      text-decoration: none;
      border-radius: var(--border-radius-lg);
      font-weight: 500;
      transition: var(--transition-bounce);
      box-shadow: var(--glass-shadow);
      border: var(--glass-border);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 1rem;
      position: relative;
      overflow: hidden;
    }

    .menu a::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, transparent 100%);
      opacity: 0;
      transition: var(--transition-base);
    }

    .menu a i {
      font-size: 2rem;
      color: var(--primary-color);
      transition: var(--transition-base);
    }

    .menu a span {
      font-size: 1.1rem;
      transition: var(--transition-base);
    }

    .menu a:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
    }

    .menu a:hover::before {
      opacity: 1;
    }

    .menu a:hover i {
      color: white;
      transform: scale(1.2);
    }

    .menu a:hover span {
      color: white;
    }

    .menu a:hover {
      background: var(--gradient-primary);
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes shimmer {
      0% { transform: translateX(-100%); }
      100% { transform: translateX(100%); }
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
      .menu {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      }
    }

    @media (max-width: 768px) {
      body {
        padding: 1rem;
      }
      
      header {
        margin-bottom: 2rem;
        padding: 1.5rem 1rem;
      }
      
      header h1 {
        font-size: 2.2rem;
        margin-top: 2rem;
      }
      
      header p {
        font-size: 1.1rem;
      }
      
      .logout {
        position: relative;
        margin-bottom: 1.5rem;
        text-align: center;
      }
      
      .logout a {
        display: inline-flex;
        margin-bottom: 1rem;
      }
      
      h2 {
        margin: 2rem 0 1.2rem;
        font-size: 1.5rem;
      }
      
      .menu {
        grid-template-columns: 1fr;
        gap: 1rem;
      }
      
      .menu a {
        padding: 1.5rem;
        flex-direction: row;
        justify-content: flex-start;
        text-align: left;
        gap: 1rem;
      }
      
      .menu a i {
        font-size: 1.5rem;
      }
    }

    @media (max-width: 480px) {
      header h1 {
        font-size: 1.9rem;
      }
      
      header p {
        font-size: 1rem;
      }
      
      h2 {
        font-size: 1.4rem;
      }
      
      .menu a {
        padding: 1.2rem;
        font-size: 1rem;
      }
      
      .menu a i {
        font-size: 1.3rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Botón logout -->
    <div class="logout">
      <a href="src/php/logout.php">
        <i class="fas fa-sign-out-alt"></i>
        <span>Cerrar sesión</span>
      </a>
    </div>

    <header>
      <h1>Panel de Control GauchoAI</h1>
      <p>Gestiona todos los aspectos del sistema de inteligencia artificial desde un solo lugar</p>
    </header>

    <!-- Categoría -->
    <h2><i class="fas fa-folder"></i> Categorías</h2>
    <div class="menu">
      <a href="src/php/formAltaCategoria.php">
        <i class="fas fa-plus-circle"></i>
        <span>Alta Categoría</span>
      </a>

      <a href="src/php/listarCategoria.php">
        <i class="fas fa-list"></i>
        <span>Listar Categorías</span>
      </a>
    </div>

    <!-- Usuario -->
    <h2><i class="fas fa-users"></i> Usuarios</h2>
    <div class="menu">
      <a href="src/php/formAltaUsuario.php">
        <i class="fas fa-user-plus"></i>
        <span>Alta Usuario</span>
      </a>

      <a href="src/php/listarUsuario.php">
        <i class="fas fa-users-cog"></i>
        <span>Listar Usuarios</span>
      </a>
    </div>

    <!-- Rol -->
    <h2><i class="fas fa-user-tag"></i> Roles</h2>
    <div class="menu">
      <a href="src/php/formAltaRol.php">
        <i class="fas fa-plus-square"></i>
        <span>Alta Rol</span>
      </a>

      <a href="src/php/listarRol.php">
        <i class="fas fa-list-alt"></i>
        <span>Listar Roles</span>
      </a>
    </div>

    <!-- Pregunta -->
    <h2><i class="fas fa-question-circle"></i> Preguntas</h2>
    <div class="menu">
      <a href="src/php/formAltaPregunta.php">
        <i class="fas fa-plus"></i>
        <span>Alta Pregunta</span>
      </a>

      <a href="src/php/listarPregunta.php">
        <i class="fas fa-tasks"></i>
        <span>Listar Preguntas</span>
      </a>
    </div>

    <!-- Respuesta -->
    <h2><i class="fas fa-comment-dots"></i> Respuestas</h2>
    <div class="menu">
      <a href="src/php/formAltaRespuesta.php">
        <i class="fas fa-plus"></i>
        <span>Alta Respuesta</span>
      </a>

      <a href="src/php/listarRespuesta.php">
        <i class="fas fa-list-ul"></i>
        <span>Listar Respuestas</span>
      </a>
    </div>
  </div>

  <script>
    // Efecto de aparición escalonada para los elementos del menú
    document.addEventListener('DOMContentLoaded', function() {
      const menuItems = document.querySelectorAll('.menu a');
      
      menuItems.forEach((item, index) => {
        item.style.animation = `fadeIn 0.5s ease ${index * 0.1}s forwards`;
        item.style.opacity = '0';
      });
    });
  </script>
</body>
</html>