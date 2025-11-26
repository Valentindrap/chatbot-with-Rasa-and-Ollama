<?php
include_once("database.class.php");

class Rol {
    private $id;
    private $nombre;
    private $conexion;

    public function __construct($id = null, $nombre = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->conexion = Database::getInstance()->getConnection();
    }

    public function guardar() {
        $sql = "INSERT INTO roles (nombre) VALUES (?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre]);
    }

    public function actualizar() {
        $sql = "UPDATE roles SET nombre=? WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM roles WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM roles WHERE id=?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new Rol($fila['id'], $fila['nombre']);
        }
        return null;
    }

    /** 
     * Devuelve array de objetos Rol 
     */
    public static function obtenerTodas() {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM roles";
        $stmt = $conexion->query($sql);

        $roles = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $roles[] = new Rol($fila['id'], $fila['nombre']);
        }
        return $roles;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}
?>
