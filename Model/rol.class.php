<?php
include "database.class.php"; // Incluye la clase de conexión a la base de datos

class Rol {
    // Atributos privados
    private $id;
    private $nombre;
    private $conexion;

    // Constructor: inicializa atributos y la conexión a la base de datos
    public function __construct($id = null, $nombre = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->conexion = Database::getInstance()->getConection(); // conexión PDO
    }

    // Método estático: obtiene un rol por su ID
    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConection();
        $sql = "SELECT * FROM roles WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return new Rol($resultado['id'], $resultado['nombre']);
        }

        return null; // Si no se encuentra, retorna null
    }

    // Método estático: obtiene todos los roles
    public static function obtenerTodxs() {
        $conexion = Database::getInstance()->getConection();
        $sql = "SELECT * FROM roles";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve todos los registros como array asociativo
    }

    // Guarda un nuevo rol (INSERT)
    public function guardar() {
        $sql = "INSERT INTO roles (nombre) VALUES (?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre]);
    }

    // Actualiza un rol existente (UPDATE)
    public function actualizar() {
        $sql = "UPDATE roles SET nombre = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->id]);
    }

    // Elimina un rol por su ID (DELETE)
    public function eliminar() {
        $sql = "DELETE FROM roles WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
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
