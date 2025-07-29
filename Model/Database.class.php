<?php

class Database {
    private static $instancia = null;

    private $nombre = "Chatbot2";
    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $conexion;

    private function __construct() {
        try {
            $dsn = "mysql:host={$this->servidor};dbname={$this->nombre};charset=utf8";
            $this->conexion = new PDO($dsn, $this->usuario, $this->clave);

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("Error de Conexión: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instancia) {
            self::$instancia = new Database();
        }

        return self::$instancia;
    }

    public function getConection() {
        return $this->conexion;
    }
}

?>