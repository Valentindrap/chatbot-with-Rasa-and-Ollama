<?php 
// Nos conectamos con la base de datos
include("conexion.php");

// Recibo el mensaje y lo guardo en la variable $mensaje
$mensaje = $_POST['text'] ?? '';

// Preparamos la consulta
$sql = "SELECT respuesta FROM consultas WHERE pregunta LIKE :pregunta";
$stmt = $pdo->prepare($sql);

// Ejecutamos la consulta
$stmt->execute(['pregunta' => "%$mensaje%"]);

// Si encontramos una respuesta
if ($stmt->rowCount() > 0) {
    // Tomamos el primer resultado
    $fetch_data = $stmt->fetch(PDO::FETCH_ASSOC);
    $respuesta = $fetch_data['respuesta'];
    echo $respuesta;
} else {
    echo "Perdón guapísimo, no te puedo ayudar 🥺";
}
?>
