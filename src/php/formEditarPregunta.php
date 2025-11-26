<?php include("check_session.php"); ?>

<?php
require_once("clases/pregunta.class.php");
require_once("clases/categoria.class.php");

if (isset($_GET['id'])) {

    $pregunta = Pregunta::obtenerPorId($_GET['id']);
    $categorias = Categoria::obtenerTodas();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/generico.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
</html>

<h2>Editar Pregunta</h2>

<form name="formEditarPregunta" method="post" action="controller/pregunta.controller.php">
    
    <input type="hidden" name="operacion" value="actualizar"/>

    <label>ID:</label>
    <input type="text" name="id" value="<?= $pregunta->getId(); ?>" readonly><br>

    <label>Pregunta:</label>
    <input type="text" name="pregunta" value="<?= $pregunta->getPregunta(); ?>" required><br>

    <label>Categoría:</label>
    <select name="categoria_id" required>
        <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat->getId(); ?>"
                <?= ($pregunta->getCategoriaId() == $cat->getId()) ? 'selected' : '' ?>>
                <?= $cat->getNombre(); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <input type="submit" value="Aceptar">

</form>

<a href="listarPregunta.php">Volver</a>

<?php
} else {
    echo "No se ha encontrado la pregunta";
}
?>
