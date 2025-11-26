<?php
include_once("database.class.php");
include_once("categoria.class.php");

class Pregunta {
    private $id;
    private $pregunta;
    private $categoria; // OBJETO Categoria
    private $conexion;

    public function __construct($id = null, $pregunta = null, $categoria = null) {
        $this->id = $id;
        $this->pregunta = $pregunta;

        // Si viene un número, cargo el objeto Categoria
        if (is_numeric($categoria)) {
            $this->categoria = Categoria::obtenerPorId($categoria);
        } else {
            $this->categoria = $categoria; // ya viene un OBJ
        }

        $this->conexion = Database::getInstance()->getConnection();
    }

    /* ======================================================
     * GUARDAR
     * ====================================================== */
    public function guardar() {
        $sql = "INSERT INTO preguntas (pregunta, categoria_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $this->pregunta,
            $this->categoria ? $this->categoria->getId() : null
        ]);
    }

    /* ======================================================
     * ACTUALIZAR
     * ====================================================== */
    public function actualizar() {
        $sql = "UPDATE preguntas SET pregunta = ?, categoria_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $this->pregunta,
            $this->categoria ? $this->categoria->getId() : null,
            $this->id
        ]);
    }

    /* ======================================================
     * ELIMINAR
     * ====================================================== */
    public function eliminar() {
        $sql = "DELETE FROM preguntas WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    /* ======================================================
     * OBTENER POR ID
     * ====================================================== */
    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConnection();

        $sql = "SELECT * FROM preguntas WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new Pregunta(
                $fila['id'],
                $fila['pregunta'],
                $fila['categoria_id'] // <-- NUMÉRICO -> se convierte en OBJETO
            );
        }

        return null;
    }

    /* ======================================================
     * OBTENER TODAS
     * ====================================================== */
    public static function obtenerTodas() {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM preguntas";
        $stmt = $conexion->query($sql);

        $preguntas = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $preguntas[] = new Pregunta(
                $fila['id'],
                $fila['pregunta'],
                $fila['categoria_id'] // convierte en objeto
            );
        }

        return $preguntas;
    }

    /* ======================================================
     * GETTERS
     * ====================================================== */
    public function getId() {
        return $this->id;
    }

    public function getPregunta() {
        return $this->pregunta;
    }

    public function getCategoria() {  
        return $this->categoria; // devuelve OBJETO
    }

    public function getCategoriaId() {
        return $this->categoria ? $this->categoria->getId() : null;
    }

    public function getCategoriaNombre() {
        return $this->categoria ? $this->categoria->getNombre() : "Sin categoría";
    }

    /* ======================================================
     * SETTERS
     * ====================================================== */
    public function setId($id) { $this->id = $id; }

    public function setPregunta($pregunta) { $this->pregunta = $pregunta; }

    public function setCategoria($categoria) {
        if (is_numeric($categoria)) {
            $this->categoria = Categoria::obtenerPorId($categoria);
        } else {
            $this->categoria = $categoria;
        }
    }
}
?>
