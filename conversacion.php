<?php
include_once __DIR__ . "/Database.class.php"; 

class Conversacion {
    private $conexion;

    public function __construct() {
        $this->conexion = Database::getInstance()->getConection();
    }

    // Buscar respuesta según la pregunta exacta
    public function buscarRespuesta($preguntaUsuario) {
        $sql = "SELECT r.respuesta 
                FROM chatbot_2_preguntas p 
                JOIN chatbot_2_respuestas r ON p.id = r.pregunta_id 
                WHERE LOWER(p.pregunta) = LOWER(?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$preguntaUsuario]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return $fila['respuesta'];
        } else {
            return "Lo siento, no entiendo tu pregunta.";
        }
    }

    // Guardar en la tabla conversaciones
    public function guardarConversacion($pregunta, $respuesta) {
        $sql = "INSERT INTO chatbot_2_conversaciones (pregunta_usuario, respuesta_bot, fecha_hora) 
                VALUES (?, ?, NOW())";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$pregunta, $respuesta]);
    }
}
?>