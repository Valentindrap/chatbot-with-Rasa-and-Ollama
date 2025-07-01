<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asistente Virtual</title>
  <link rel="stylesheet" href="build/css/chat.css">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
  <header>
    <h1>Asistente Virtual</h1>
    <p>Resuelve tus dudas en tiempo real con nuestro chatbot</p>
  </header>

  <div class="chat-wrapper">
    <div class="chat-header">
      Chat de Soporte Técnico
    </div>
    <div class="chat-body" id="chat-log">
      <div class="message bot">Hola, ¿en qué puedo ayudarte hoy?</div>
    </div>
    <form class="chat-input" id="chat-form">
      <input type="text" id="data" placeholder="Escribe un mensaje..." required />
      <button type="submit">Enviar</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#chat-form').on('submit', function(e) {
        e.preventDefault();
        const mensajeUsuario = $('#data').val().trim();
        if (!mensajeUsuario) return;

        $('#chat-log').append(`<div class="message user">${mensajeUsuario}</div>`);
        $('#data').val('');

        $.ajax({
          url: "http://localhost:5005/webhooks/rest/webhook",
          type: "POST",
          contentType: "application/json",
          data: JSON.stringify({ sender: "usuario123", message: mensajeUsuario }),
          success: function(res) {
            if (res.length > 0 && res[0].text) {
              $('#chat-log').append(`<div class="message bot">${res[0].text}</div>`);
              $('#chat-log').scrollTop($('#chat-log')[0].scrollHeight);
            }
          },
          error: function() {
            $('#chat-log').append(`<div class="message bot">⚠️ No se pudo conectar al servidor.</div>`);
          }
        });
      });
    });
  </script>
</body>
</html>