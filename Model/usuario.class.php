<?php
Include "database.class.php";

class Usuario{
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $rol;
    private $conexion;

    public function __construct($id = null, $nombre = null, $email = null, $password = null, $rol_id = null){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol_id;
        $this->conexion = Database::getInstance()->getConection(); // Conexión PDO
    }

    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConection();
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return new Usuario(
                $resultado['id'], 
                $resultado['nombre'], 
                $resultado['email'], 
                $resultado['password'], 
                $resultado['rol']
            ); 
        }
        return null;
    }

    public static function obtenerTodos() {
        $conexion = Database::getInstance()->getConection();
        $sql = "SELECT * FROM usuarios";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve todos los usuarios como array asociativo
    }

    public static function obtenerPorEmail($email) {
        $conexion = Database::getInstance()->getConection();
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$email]);
        
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return new Usuario(
                $resultado['id'], 
                $resultado['nombre'], 
                $resultado['email'], 
                $resultado['password'], 
                $resultado['rol']
            );
        }
        return null; // Si no se encuentra, retorna null
    }

    // Guarda un nuevo usuario (INSERT)
    public function guardar() {
        $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->email, password_hash($this->password, PASSWORD_DEFAULT), $this->rol]);
    }

    // Verifica si las credenciales de login son correctas
    public static function verificarLogin($email, $password) {
        $usuario = self::obtenerPorEmail($email);
        if ($usuario) {
            // Verifica la contraseña usando password_verify
            if (password_verify($password, $usuario->password)) {
                return $usuario; // Retorna el objeto de usuario si las credenciales son correctas
            }
        }
        return null; // Si las credenciales son incorrectas, retorna null
    }
     // Getters
     public function getId() {
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->nombre;
    }
    public function getRol_Id(){
        return $this->nombre;
    }

// Getters

    public function setId($id){
        $this->id = $id;
    }
    public function setnombre($nombre){
        $this->nombre = $nombre;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setRol_Id($rol_Id){
        $this->rol_id = $rol_Id;
    }
}
?>