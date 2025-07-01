
<link rel="stylesheet" href="../css/altaConsulta.css">
<link rel="icon" href="../img/mascota-chatbot.png">
 
    <div class="resultado-container">

        <img src="../img/mascota-chatbot.png" alt="Chatbot" class="chatbot-img">

        <div class="mensaje">
            <?php 
                include("conexion.php");

                $sql = "INSERT INTO consultas (pregunta, respuesta, categoria) VALUES (:pregunta, :respuesta, :categoria)";
                $stmt = $pdo->prepare($sql);

                if ($stmt->execute([
                    "pregunta" => $_POST["pregunta"],
                    "respuesta" => $_POST["respuesta"],
                    "categoria" => $_POST["categoria"]
                ])) {
                    echo "<div class='success'>✅ Registro cargado completamente</div>";
                } else {
                    echo "<div class='error'>❌ Error al cargar los datos</div>";
                }
            ?>
            <br>
            <a class="volver" href="listarConsultas.php">⬅ Volver a la lista</a>
            
        </div>
    </div>




