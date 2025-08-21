<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Asistente Virtual</title>
  <link rel="stylesheet" href="src/css/chat.css" />
  <link rel="icon" href="src/img/logo.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
  <header>
        <a href="login.html" class="login-btn">Iniciar Sesión</a>

    <h1>Asistente Virtual</h1>
    <p>Resuelve tus dudas en tiempo real con nuestro asistente inteligente</p>
  </header>


    <button id="theme-toggle">
    <i class="fas fa-sun"></i>
  </button>

    <div class="stars-container"></div>

  <div class="chat-wrapper">
    <div class="chat-header">
      <i class="fas fa-robot"></i>
      <span>GauchoAI</span>
      <span id="message-count" style="margin-left:auto; font-weight:400; font-size:0.9rem;">0 mensajes</span>
    </div>
    <div class="chat-body" id="chat-log">
      <div class="message bot">¡Hola! 👋 Soy tu asistente virtual. ¿En qué puedo ayudarte hoy?</div>
    </div>
    <form class="chat-input" id="chat-form">
      <input type="text" id="data" placeholder="Escribe tu mensaje aquí..." required />
      <button type="submit">
        <i class="fas fa-paper-plane"></i>
        <span>Enviar</span>
      </button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function () {
      let contadorMensajes = 1;
      function actualizarContador() {
        $('#message-count').text(`${contadorMensajes} mensaje${contadorMensajes !== 1 ? 's' : ''}`);
      }

      function simularEscritura(elemento, texto, callback) {
        let i = 0;
        const velocidad = 25;
        const intervalo = setInterval(() => {
          if (i < texto.length) {
            $(elemento).append(texto.charAt(i));
            i++;
            $('#chat-log').scrollTop($('#chat-log')[0].scrollHeight);
          } else {
            clearInterval(intervalo);
            if (callback) callback();
          }
        }, velocidad);
      }

      $('#chat-form').on('submit', function (e) {
        e.preventDefault();
        const mensajeUsuario = $('#data').val().trim();
        if (!mensajeUsuario) return;

        $('#chat-log').append(`<div class="message user">${mensajeUsuario}</div>`);
        $('#data').val('');
        contadorMensajes++;
        actualizarContador();
        $('#chat-log').scrollTop($('#chat-log')[0].scrollHeight);

        // Mostrar "Escribiendo..."
        $('#chat-log').append(`<div class="message bot typing">Escribiendo<span class="dots">.</span></div>`);
        let puntos = 1;
        const animarPuntos = setInterval(() => {
          const dots = '.'.repeat(puntos % 4);
          $('.message.typing .dots').text(dots);
          puntos++;
        }, 500);

        $.ajax({
          url: "http://localhost:5005/webhooks/rest/webhook",
          type: "POST",
          contentType: "application/json",
          data: JSON.stringify({ sender: "usuario123", message: mensajeUsuario }),
          success: function (res) {
            clearInterval(animarPuntos);
            $('.message.typing').remove();
            if (res.length > 0 && res[0].text) {
              // Crea el nuevo elemento para la respuesta del bot
              $('#chat-log').append(`<div class="message bot"></div>`);
              const nuevoMensajeBot = $(".message.bot:last");

              // Llama a la función con el nuevo elemento
              simularEscritura(nuevoMensajeBot, res[0].text);
              contadorMensajes++;
              actualizarContador();
            }
          },
          error: function () {
            clearInterval(animarPuntos);
            $('.message.typing').remove();
            $('#chat-log').append(`<div class="message bot">⚠️ Lo siento, hubo un error al conectarme con el servidor. Por favor intenta nuevamente.</div>`);
            contadorMensajes++;
            actualizarContador();
          }
        });
      });

      actualizarContador();
      $('#chat-log').scrollTop($('#chat-log')[0].scrollHeight);
    });
  </script>

  <script>
  const body = document.body;
  const toggleBtn = document.getElementById('theme-toggle');
  const icon = toggleBtn.querySelector('i');
  const starsContainer = document.querySelector('.stars-container');
  const starCount = 80;

  // Cambiar icono y tema
  function updateThemeIcon() {
    if (body.classList.contains('dark')) {
      icon.classList.replace('fa-sun', 'fa-moon');
    } else {
      icon.classList.replace('fa-moon', 'fa-sun');
    }
  }

  function setTheme(theme) {
    body.classList.remove('light', 'dark');
    body.classList.add(theme);
    localStorage.setItem('chat-theme', theme);
    updateThemeIcon();
    updateStarColors();
  }

  // Tema guardado o por defecto claro
  const savedTheme = localStorage.getItem('chat-theme') || 'light';
  setTheme(savedTheme);

  toggleBtn.addEventListener('click', () => {
    const currentTheme = body.classList.contains('light') ? 'dark' : 'light';
    setTheme(currentTheme);
  });

  // Crear estrellas móviles
  for (let i = 0; i < starCount; i++) {
    const star = document.createElement('div');
    star.className = 'star';
    star.style.left = `${Math.random() * 100}%`;
    star.style.top = `${Math.random() * 100}%`;
    star.style.animationDuration = `${10 + Math.random() * 20}s`;
    starsContainer.appendChild(star);
  }

  function updateStarColors() {
    const isDark = body.classList.contains('dark');
    document.querySelectorAll('.star').forEach(star => {
      star.style.background = isDark ? 'white' : 'black';
    });
  }

  updateStarColors();
  </script>
</body>
</html>   