<?php
Include_once "database.class.php";

class usuarios{
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
                $resultado['rol_id']
            ); 
        }
        return null;
    }
    public static function obtenerTodos() {
        $conexion = Database::getInstance()->getConection();
        $sql = "SELECT * FROM usuarios";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                $resultado['rol_id']
            );
        }
        return null; 
    }
    public function guardar() {
        $sql = "INSERT INTO usuarios (nombre, email, password, rol_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $this->nombre, 
            $this->email, 
            $this->password,
            $this->rol
        ]);
    }
    public function eliminar() {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }
    public function actualizar() {
        $sql = "UPDATE usuarios SET nombre = ?, email = ?, password = ?, rol_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);
        return $stmt->execute([
            $this->nombre,
            $this->email,
            $passwordHash,
            $this->rol,
            $this->id
        ]);
    }
    
    public static function validarLogin($email, $password) {
    $conexion = Database::getInstance()->getConection();
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Obtenemos los datos del usuario
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificamos si la contraseña coincide
        if (password_verify($password, $usuario['password'])) {
            return true; // Login exitoso
        }
    }
    return false; // Login fallido
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
        return $this->password;
    }
    public function getRol_Id(){
     return $this->rol;
    }
    // Setters
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
        $this->rol = $rol_Id;
    }
}
?>