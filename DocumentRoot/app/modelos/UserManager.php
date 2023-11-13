<?php
include("../modelos/database.php");
class AdministradorUsuarios {
    private $pdo;
    private $table_name = "usuario";
    private $id;
    private $email;
    private $es_admin;
    private $userName;

    //conexión con la clase Database
    public function __construct() {
        $pdo = new Database();
        $this->pdo = $pdo->connect();
    }

    //getters
    public function getId(){
        return $this->id; 
    }

    public function getEmail(){
        return $this->email; 
    }

    public function getEsAdmin(){
        return $this->es_admin; 
    }

    public function getUsername(){
        return $this->userName;
    }

    public function obtenerTodosLosUsuarios() {
        $query = "SELECT * FROM usuario";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerUsuarioPorId($idUsuario) {
        $query = "SELECT * FROM usuario WHERE id = :idUsuario";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function agregarUsuario($datosUsuario) {
        $query = "INSERT INTO usuario (nombre, apellido, email, contrasena, username, es_admin, fecha_alta, estado_id) 
              VALUES (:nombre, :apellido, :email, :contrasena, :username, :es_admin, NOW(), 1)";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute($datosUsuario);

    return $this->pdo->lastInsertId();
    }

    public function actualizarUsuario($datosUsuario) {
        $query = "UPDATE usuario 
                  SET nombre = :nombre, apellido = :apellido, email = :email, 
                      contrasena = :contrasena, username = :username, es_admin = :es_admin 
                  WHERE id = :idUsuario";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($datosUsuario);
    }

    public function eliminarUsuario($idUsuario) {
        $query = "DELETE FROM usuario WHERE id = :idUsuario";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        return $stmt->execute();
    }

    //function login 
    public function login($email, $password)
    {
        try {
            $query = "SELECT id, email, es_admin, username FROM " . $this->table_name . " 
                      WHERE email = :email AND contrasena = :contrasena";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contrasena', $password);

            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            //si encuentro al usuario en la base de datos, guardo los datos en mi objeto $user 
            //hash if(password_verify($password,$user['password']))
            if ($user) {
                $this->id = $user['id'];
                $this->email = $user['email'];
                return true; 
            } else {
                return false; //el login no es correcto
            }
        } catch (PDOException $e) {
            echo "Error al realizar el inicio de sesión " . $e->getMessage();
            return false; // Error al realizar el inicio de sesión
        }
    }

    public function passwordRecovery($email){
        try {
            $query= "SELECT id, email, es_admin, username FROM " . $this->table_name . "
            WHERE email = :email";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return true;
            } catch (\Throwable $th) {
            //throw $th;
        }
    }


}
?>
