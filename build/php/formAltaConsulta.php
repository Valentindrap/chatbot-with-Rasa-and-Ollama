<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Consulta</title>
    <link rel="stylesheet" href="../css/formAltaConsultas.css">
    <link rel="icon" href="../img/mascota-chatbot.png">
</head>
<body>
    <div class="chatbot-container">
        <div class="mascota-wrapper">
            <img src="../img/mascota-chatbot.png" alt="Mascota Chatbot" class="chatbot-img">
            <div class="chatbot-bubble">¡Hola! Soy tu asistente, completá el formulario 👇</div>
        </div>
        
        <form name="formAltaConsulta" action="altaConsulta.php" method="POST">
            <h2>Formulario de Consulta</h2>
            
            <label for="pregunta">Pregunta</label>
            <input type="text" name="pregunta" id="pregunta" required />

            <label for="respuesta">Respuesta</label>
            <input type="text" name="respuesta" id="respuesta" required />

            <label for="categoria">Categoría</label>
            <select name="categoria" id="categoria" required>
                <option value="Sistema Operativo">Sistema Operativo</option>
                <option value="Software">Software</option>
                <option value="Conectividad">Conectividad</option>
                <option value="Hardware">Hardware</option>
                <option value="Seguridad">Seguridad</option>
            </select>

            <input type="submit" value="Enviar solicitud">
        </form>
    </div>

    <div class="volverdiv">
        <a href='listarConsultas.php' class='volver-link'>Ver lista de consultas</a>
    </div>
    <div class="volverdiv">
        <a href='../../index.php' class='volver-link'>Ir a inicio</a>
    </div>

    <footer>
        <div>
            <img src="../img/logo.png" style="width: 100px; height: 100px;"/>
        </div>
        <div>
            <p>Integrantes: Valentin Drapanti - Agustin Casado</p>
            <p>&copy; Grupo N°1</p>
            <p>7I - Programacion III</p>
        </div>
        <div></div>
    </footer>
</body>
</html>
