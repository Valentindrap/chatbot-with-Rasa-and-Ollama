<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Consultas</title>
    <link rel="stylesheet" href="../css/listarConsultas.css">
    <link rel="icon" href="../img/mascota-chatbot.png">
</head>
<body>

    <div class="container">
        <div class="mascota">
            <img src="../img/mascota-chatbot.png" alt="Chatbot">
            <div class="mensaje-chatbot">¡Estas son tus consultas cargadas!</div>
        </div>

        <div class="contenido">
            <a href='formAltaConsulta.php' class='volver-link'>➕ Volver a cargar consultas</a>
            <a href='../../index.php' class='volver-link'>↩️ Volver a inicio</a>

            <?php
            include("conexion.php");

            $sql = "SELECT * FROM consultas";
            $consultas = $pdo->query($sql);

            foreach ($consultas as $consulta) {
                echo "<div class='consulta'>";
                echo "<p><b>📝 Pregunta:</b> " . htmlspecialchars($consulta['pregunta']) . "</p>";
                echo "<p><b>✅ Respuesta:</b> " . htmlspecialchars($consulta['respuesta']) . "</p>";
                echo "<p><b>📂 Categoría:</b> " . htmlspecialchars($consulta['categoria']) . "</p>";
                echo "<div class='acciones'>";
                echo "<a class='editar' href='formEditarConsulta.php?id=" . $consulta['id'] . "'>✏ Editar</a>";
                echo "<a class='borrar' href='eliminarConsulta.php?id=" . $consulta['id'] . "'>🗑 Eliminar</a>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
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
