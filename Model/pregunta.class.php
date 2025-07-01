<?php
include "database.class.php";

class Pregunta {
    private $id;
    private $pregunta;
    private $categoria_id;
    private $conexion;

    public function __construct($id = null, $pregunta = null, $categoria_id = null) {
        $this->id = $id;
        $this->pregunta = $pregunta;
        $this->categoria_id = $categoria_id;
        $this->conexion = Database::getInstance()->getConection();
    }

    public function guardar() {
        $sql = "INSERT INTO preguntas (pregunta, categoria_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->pregunta, $this->categoria_id]);
    }

    public static function obtenerTodos() {
        $conexion = Database::getInstance()->getConection();
        $sql = "SELECT * FROM preguntas";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConection();
        $sql = "SELECT * FROM preguntas WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return new Pregunta(
                $resultado['id'],
                $resultado['pregunta'],
                $resultado['categoria_id']
            );
        }
        return null;
    }

    public function actualizar() {
        $sql = "UPDATE preguntas SET pregunta = ?, categoria_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->pregunta, $this->categoria_id, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM preguntas WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    // Getters
    public function getId() {
        return $this->id;
    }
    public function getPregunta() {
        return $this->pregunta;
    }
    public function getCategoriaId() {
        return $this->categoria_id;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setPregunta($pregunta) {
        $this->pregunta = $pregunta;
    }
    public function setCategoriaId($categoria_id) {
        $this->categoria_id = $categoria_id;
    }
}
?>