<?php
include_once "database.class.php";

class Conversacion {
    private $id;
    private $pregunta_usuario;
    private $respuesta_bot;
    private $fecha_hora;
    private $conexion;

    public function __construct($id = null, $pregunta_usuario = null, $respuesta_bot = null, $fecha_hora = null) {
        $this->id = $id;
        $this->pregunta_usuario = $pregunta_usuario;
        $this->respuesta_bot = $respuesta_bot;
        $this->fecha_hora = $fecha_hora;
        $this->conexion = Database::getInstance()->getConection();
    }

    public function guardar() {
        $sql = "INSERT INTO conversaciones (pregunta_usuario, respuesta_bot, fecha_hora) VALUES (?, ?, NOW())";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->pregunta_usuario, $this->respuesta_bot]);
    }

    public static function obtenerTodas(){
        $conexion = Database::getInstance()->getConection();
        $sql = "SELECT * FROM conversacion ORDER BY fecha_hora DESC";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function obtenerPorId($id){
        $conexion = Database::getInstance()->getConection();
        $sql = "SELECT * FROM conversacion WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function guardarConversacion($pregunta, $respuesta) {
        $conexion = Database::getInstance()->getConection();
        $sql = "INSERT INTO conversaciones (pregunta_usuario, respuesta_bot, fecha_hora) VALUES (?, ?, NOW())";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute([$pregunta, $respuesta]);
    }
    public function buscarRespuesta($preguntaUsuario) {
        $sql = "SELECT r.respuesta 
                FROM preguntas p 
                JOIN respuestas r ON p.id = r.pregunta_id 
                WHERE LOWER(p.pregunta) LIKE LOWER(?) 
                LIMIT 1";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(['%' . $preguntaUsuario . '%']);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($fila) {
            return $fila['respuesta'];
        } else {
            return "Lo siento, no entiendo tu pregunta.";
        }
    }
}
?>