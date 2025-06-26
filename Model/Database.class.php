<?php

class Database {
    private static $instancia = null;

    // Configuración de la base de datos
    private $nombre = "chatbot2";
    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $conexion;

    // Constructor privado para evitar múltiples instancias
    private function __construct() {
        try {
            $dsn = "mysql:host={$this->servidor};dbname={$this->nombre};charset=utf8";
            $this->conexion = new PDO($dsn, $this->usuario, $this->clave);

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("Error de Conexión: " . $e->getMessage());
        }
    }

    // Método estático para obtener la única instancia de la clase
    public static function getInstance() {
        if (!self::$instancia) {
            self::$instancia = new Database();
        }

        return self::$instancia;
    }

    // Devuelve el objeto de conexión PDO
    public function getConection() {
        return $this->conexion;
    }
}

?>