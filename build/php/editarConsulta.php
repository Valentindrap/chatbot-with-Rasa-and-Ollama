<link rel="stylesheet" href="../css/editarConsulta.css">
<link rel="icon" href="build/img/mascota-chatbot.png">
<?php
include("conexion.php");

$sql = "UPDATE consultas SET pregunta=:pregunta, respuesta=:respuesta, categoria=:categoria WHERE id=:id";
$stmt = $pdo->prepare($sql);

if ($stmt->execute([
    "pregunta" => $_POST["pregunta"],
    "respuesta" => $_POST["respuesta"],
    "categoria" => $_POST["categoria"],
    "id" => $_POST["id"]
])) {
    echo "<div class='mensaje success'>✅ Registro actualizado completamente</div>";
} else {
    echo "<div class='mensaje error'>❌ Error al actualizar los datos</div>";
}

echo "<a class='volver-link' href='listarConsultas.php'>Volver a la lista de consultas</a>";
?>
