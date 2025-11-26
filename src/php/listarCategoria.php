<?php include("check_session.php"); ?>

<?php
require_once("clases/categoria.class.php");
$categorias = Categoria::obtenerTodas();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/generico.css">
    <link rel="icon" href="../img/logo.png" type="image/png">
</head>
</html>

<h2 style="text-align: center;">Lista de Categorias</h2>

<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaCategoria.php">Nueva categoria</a>
</div>

<a href="../../entrada.php">Volver</a>

<?php
if ($categorias == null) {
    echo "No hay Categorias";
}
?>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($categorias as $categoria) { ?>
        <tr>
            <td><?= $categoria->getId() ?></td>
            <td><?= $categoria->getNombre() ?></td>

            <td>
                <!-- ENLACE EDITAR -->
                <a href="formEditarCategoria.php?id=<?= $categoria->getId() ?>">Editar</a>

                <!-- FORM ELIMINAR -->
                <form action="controller/categoria.controller.php" method="post" style="display:inline;">
                    <input type="hidden" name="operacion" value="eliminar">
                    <input type="hidden" name="id" value="<?= $categoria->getId() ?>">
                    <input type="submit" onclick="return confirm('¿Está seguro de eliminar esta categoria?')" value="Eliminar">
                </form>
            </td>
        </tr>
    <?php } ?>

</table>
