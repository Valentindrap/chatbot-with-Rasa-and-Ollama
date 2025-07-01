<?php
include ("conexion.php");

$sql = "SELECT * FROM consultas WHERE id = (:id)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_GET['id']]);

if ($consulta = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Consulta</title>
    <link rel="stylesheet" href="../css/formEditarConsultas.css">
    <link rel="icon" href="../img/mascota-chatbot.png">
</head>
<body>

    <div class="container">
        <div class="mascota">
            <img src="../img/mascota-chatbot.png" alt="Chatbot Mascota">
            <div class="mensaje-chatbot">¡Editá tu consulta!</div>
        </div>

        <form name="formEditarConsulta" action="editarConsulta.php" method="POST" class="formulario">
            <label for="id">ID:</label>
            <input type="text" name="id" value="<?= htmlspecialchars($consulta['id']); ?>" readonly/>

            <label for="pregunta">Pregunta</label>
            <input type="text" name="pregunta" value="<?= htmlspecialchars($consulta['pregunta']); ?>" id="pregunta" required/>

            <label for="respuesta">Respuesta</label>
            <input type="text" name="respuesta" value="<?= htmlspecialchars($consulta['respuesta']); ?>" id="respuesta" required/>

            <label for="categoria">Categoría</label>
            <select name="categoria" id="categoria" required>
                <?php
                $categorias = ["Sistema Operativo", "Software", "Conectividad", "Hardware", "Seguridad"];
                foreach ($categorias as $categoria) {
                    $selected = ($consulta['categoria'] == $categoria) ? 'selected' : '';
                    echo "<option value='$categoria' $selected>$categoria</option>";
                }
                ?>
            </select>

            <input type="submit" value="Actualizar Consulta" class="submit-btn">
        </form>
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

<?php
} else {
    echo "<div class='error'>El registro seleccionado no existe</div>";
    echo "<a href='listarConsultas.php' class='volver-link'>Volver</a>";
}
?>
