<?php include("check_session.php"); ?>

<?php
require_once("./clases/pregunta.class.php");
require_once("./clases/categoria.class.php");

$categorias = Categoria::obtenerTodas(); // devuelve objetos
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/generico.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
</html>

<h2 style="text-align:center;">Nueva Pregunta</h2>

<form name="formAltaPregunta" method="post" action="controller/pregunta.controller.php" style="max-width:400px; margin:auto;">
    <input type="hidden" name="operacion" value="guardar"/>

    <label>Pregunta:</label><br>
    <input type="text" name="pregunta" required><br><br>

    <label>Categoría:</label><br>
    <select name="categoria_id" required>
        <option value="">Seleccione...</option>

        <?php foreach ($categorias as $cat) { ?>
            <option value="<?= $cat->getID() ?>">
                <?= $cat->getNombre() ?>
            </option>
        <?php } ?>
    </select>
    <br><br>

    <input type="submit" value="Aceptar">
</form>
