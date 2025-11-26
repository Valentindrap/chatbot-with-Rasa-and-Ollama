<?php
include_once("database.class.php");
include_once("rol.class.php");

class Usuario {
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $rol; // OBJETO Rol
    private $conexion;

    public function __construct($id = null, $nombre = null, $email = null, $password = null, $rol = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;

        // Si viene un ID, cargar el objeto rol desde la BD
        if (is_numeric($rol)) {
            $this->rol = Rol::obtenerPorId($rol);
        } else {
            $this->rol = $rol; // ya es un objeto Rol
        }

        $this->conexion = Database::getInstance()->getConnection();
    }

    // ----------------------------------------------------------
    // CRUD
    // ----------------------------------------------------------

    public function guardar() {
        $sql = "INSERT INTO usuarios (nombre, email, password, rol_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $this->nombre,
            $this->email,
            $this->password,
            $this->rol ? $this->rol->getId() : null
        ]);
    }

    public function actualizar() {
        if ($this->password === null) {
            $sql = "UPDATE usuarios SET nombre=?, email=?, rol_id=? WHERE id=?";
            $stmt = $this->conexion->prepare($sql);
            return $stmt->execute([
                $this->nombre,
                $this->email,
                $this->rol ? $this->rol->getId() : null,
                $this->id
            ]);
        } else {
            $sql = "UPDATE usuarios SET nombre=?, email=?, password=?, rol_id=? WHERE id=?";
            $stmt = $this->conexion->prepare($sql);
            return $stmt->execute([
                $this->nombre,
                $this->email,
                $this->password,
                $this->rol ? $this->rol->getId() : null,
                $this->id
            ]);
        }
    }

    public function eliminar() {
        $sql = "DELETE FROM usuarios WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    // ----------------------------------------------------------
    // Métodos estáticos
    // ----------------------------------------------------------

    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM usuarios WHERE id=?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new Usuario(
                $fila['id'],
                $fila['nombre'],
                $fila['email'],
                $fila['password'],
                $fila['rol_id']
            );
        }

        return null;
    }

    public static function obtenerPorEmail($email) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM usuarios WHERE email=?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$email]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new Usuario(
                $fila['id'],
                $fila['nombre'],
                $fila['email'],
                $fila['password'],
                $fila['rol_id']
            );
        }

        return null;
    }

    public static function verificarLogin($email, $passwordIngresada) {
        $usuario = self::obtenerPorEmail($email);

        if ($usuario && password_verify($passwordIngresada, $usuario->getPassword())) {
            return $usuario;
        }

        return null;
    }

    public static function obtenerTodas() {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM usuarios";
        $stmt = $conexion->query($sql);

        $usuarios = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = new Usuario(
                $fila['id'],
                $fila['nombre'],
                $fila['email'],
                $fila['password'],
                $fila['rol_id']
            );
        }

        return $usuarios;
    }

    // ----------------------------------------------------------
    // Getters
    // ----------------------------------------------------------

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRol() {
        return $this->rol; // devuelve OBJETO Rol
    }

    public function getRolId() {
        return $this->rol ? $this->rol->getId() : null;
    }

    // ----------------------------------------------------------
    // Setters
    // ----------------------------------------------------------

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRol($rol) {
        if (is_numeric($rol)) {
            $this->rol = Rol::obtenerPorId($rol);
        } else {
            $this->rol = $rol;
        }
    }
}
?>
