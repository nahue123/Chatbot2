<?php
include "database.class.php" ;

class Rol{
    private $id;
    private $nombre;
    private $conexion;

    public function __construct($id=null, $nombre=null){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->conexion= Database::getInstance()->getConection();

    }

    public static function obtenerTodxs(){
        $conexion= Database::getInstance()->getConection();
        $sql="SELECT * FROM roles";
        $stmt= $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function guardar(){
        $sql= "INSERT INTO roles (nombre) VALUES (?)";
        $stmt= $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre]);
    }

    public function actualizar(){
        $sql= "UPDATE roles SET nombre= ? WHERE id = ?";
        $stmt= $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->id]);
    }

    public function eliminar(){
        $sql= "DELETE FROM roles WHERE id = ?";
        $stmt= $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setId($id){
        $this->id=$id;
    }

    
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }





    
   

    public function obtenerTodas(){

    }

    public function obtenerPorld(){

    }
}

?>