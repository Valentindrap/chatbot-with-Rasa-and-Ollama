<link rel="stylesheet" href="../css/eliminarConsulta.css">
<link rel="icon" href="../img/mascota-chatbot.png">
<?php
include("conexion.php");

$sql = "DELETE FROM consultas WHERE id=:id";
$stmt = $pdo->prepare($sql);

if ($stmt->execute([ 
    "id" => $_GET["id"] 
])) {
    echo "<div class='mensaje success'>🗑️ Registro eliminado completamente</div>";
} else {
    echo "<div class='mensaje error'>❌ Error al eliminar los datos</div>";
}

echo "<a class='volver-link' href='listarConsultas.php'>Volver a la lista de consultas</a>";
?>
