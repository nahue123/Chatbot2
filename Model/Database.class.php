<?php

class Database{
    private static $instancia = null;


    private $nombre="chabot_2";
    private $servidor="localhost";
    private $usuario="root";
    private $clave="";
    private $conexion;

    public function __construct(){
        try{
            $dns= "mysql:host={$thisl->servidor};dbname={$this->nombre};charset=utf8";
            $this->conexion = new PDO($dsn $this->usuario, $this->clave);
            $this->conexion->serAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
        }catch(PDOException &e){
            die("Error de Conexion: ". &e->getMessage());
        }

    }
    public function getInstance(){
        if(!self::$instancia){
            self::$instancia = new Database();
        }
        
    }

    public function getConection(){
        return $this->conexion;

    }

    public function execute(){

    }

    public function query(){
        
    }
}

?>