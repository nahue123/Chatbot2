<?php
include_once "database.class.php";

class Respuesta{
    private $id;
    private $respuesta;
    private $pregunta_id;
    private $conexion;

    public function __construct($id = null, $respuesta = null, $pregunta_id = null) {
        $this->id = $id;
        $this->respuesta = $respuesta;
        $this->pregunta_id = $pregunta_id;
        $this->conexion = Database::getInstance()->getConection();
    }

    public function guardar(){
        $sql = "INSERT INTO respuestas (respuesta, pregunta_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->respuesta, $this->pregunta_id]);
    }
    
    public static function buscar($texto) {
        $conexion = Database::getInstance()->getConection();
        
        // Buscar pregunta parecida
        $sql = "SELECT r.respuesta 
                FROM preguntas p
                JOIN respuestas r ON p.id = r.pregunta_id
                WHERE p.pregunta LIKE ? 
                LIMIT 1";
        $stmt = $conexion->prepare($sql);
        $stmt->execute(['%' . $texto . '%']);
        
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            return $resultado['respuesta'];
        } else {
            return "Lo siento, no tengo una respuesta para eso.";
        }
    }
    
    public static function obtenerTodas(){
        $conexion = Database::getInstance()->getConection();
        $sql = "SELECT * FROM respuestas";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function obtenerPorId($id){
        $conexion = Database::getInstance()->getConection();
        $sql = "SELECT * FROM respuestas WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return new Respuesta(
                $resultado['id'],
                $resultado['respuesta'],
                $resultado['pregunta_id']
            );
        }
        return null;
    }

    public function actualizar(){
        $sql = "UPDATE respuestas SET respuesta = ?, pregunta_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->respuesta, $this->pregunta_id, $this->id]);
    }

    public function eliminar(){
        $sql = "DELETE FROM respuestas WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }
    // Getters
    public function getId() {
        return $this->id;
    }
    public function getRespuesta() {
        return $this->respuesta;
    }
    public function getPreguntaId() {
        return $this->pregunta_id;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setRespuesta($respuesta) {
        $this->respuesta = $respuesta;
    }
    public function setPreguntaId($pregunta_id) {
        $this->pregunta_id = $pregunta_id;
    }
}

?>