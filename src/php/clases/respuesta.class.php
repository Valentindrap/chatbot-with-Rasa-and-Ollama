<?php
include_once("database.class.php");
include_once("pregunta.class.php");

class Respuesta {
    private $id;
    private $respuesta;
    private $pregunta; // OBJETO Pregunta
    private $conexion;

    public function __construct($id = null, $respuesta = null, $pregunta = null) {
        $this->id = $id;
        $this->respuesta = $respuesta;

        if (is_numeric($pregunta)) {
            $this->pregunta = Pregunta::obtenerPorId($pregunta);
        } else {
            $this->pregunta = $pregunta; // ya es objeto
        }

        $this->conexion = Database::getInstance()->getConnection();
    }

    public function guardar() {
        $sql = "INSERT INTO respuestas (respuesta, pregunta_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $this->respuesta,
            $this->pregunta ? $this->pregunta->getId() : null
        ]);
    }

    public static function obtenerTodas() {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM respuestas";
        $stmt = $conexion->query($sql);

        $respuestas = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $respuestas[] = new Respuesta(
                $fila["id"],
                $fila["respuesta"],
                $fila["pregunta_id"]
            );
        }

        return $respuestas;
    }

    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM respuestas WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new Respuesta(
                $fila["id"],
                $fila["respuesta"],
                $fila["pregunta_id"]
            );
        }
        return null;
    }

    public function actualizar() {
        $sql = "UPDATE respuestas SET respuesta = ?, pregunta_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $this->respuesta,
            $this->pregunta ? $this->pregunta->getId() : null,
            $this->id
        ]);
    }

    public function eliminar() {
        $sql = "DELETE FROM respuestas WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public function getId() { return $this->id; }
    public function getRespuesta() { return $this->respuesta; }
    public function getPregunta() { return $this->pregunta; } // devuelve OBJETO Pregunta

    public function setId($id) { $this->id = $id; }
    public function setRespuesta($respuesta) { $this->respuesta = $respuesta; }

    public function setPregunta($pregunta) {
        if (is_numeric($pregunta)) {
            $this->pregunta = Pregunta::obtenerPorId($pregunta);
        } else {
            $this->pregunta = $pregunta;
        }
    }
}
?>
