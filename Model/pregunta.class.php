<?php

class Database{
    private $id;
    private $pregunta;
    private $categoria;
    private $conexion;

    public function __construct($id = null, $pregunta = null, $categoria = null) {
        $this->id = $id;
        $this->pregunta = $pregunta;
        $this->categoria_id = $categoria_id;
        $this->conexion = Database::getInstance()->getConection(); 
    }

    public function guardar(){
        $sql = "INSERT INTO preguntas (nombre, pregunta) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $this->pregunta,
            $this->categoria_id
        ]);
    }

    public static function obtenerTodas() {
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
            return new Pregunta($resultado['id'],  $resultado['pregunta'], $resultado['categoria_id']);
        }

        return null; 
    }

    public function actualizar(){
        $sql = "UPDATE preguntas SET nombre = ?, pregunta = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $this->pregunta,
            $this->categoria_id
            $this->id
        ]);
    }

    public function eliminar(){
        $sql = "DELETE FROM preguntas WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }
}

?>