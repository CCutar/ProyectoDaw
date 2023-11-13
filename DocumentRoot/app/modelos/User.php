<?php

require_once 'Connection.php';

class User {
    private $conn;
    private $table_name = "usuario";
    private $id;
    private $email;
    private $es_admin;
    private $userName;

    public function __construct()
    {
        $connection = new Connection();
        $this->conn = $connection->connect();
    }

    public function getId()
    {
        return $this->id; 
    }

    public function getEmail()
    {
        return $this->email; 
    }

    public function getEsAdmin()
    {
        return $this->es_admin; 
    }

    public function getUsername() {
        return $this->userName;
    }

    public function createUser($email, $pass, $name)
    {
        try {
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
            $query = "INSERT INTO " . $this->table_name . "(
                        email, 
                        password, 
                        username
                        ) 
                      VALUES (
                        :email, 
                        :pass, 
                        :username
                        )";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $hashed_password);
            $stmt->bindParam(':username', $nom);

            $stmt->execute();
        } catch (Exception $e) {
            echo ("Error en el controlador: " . $e->getMessage());
        }
    }

//function login 
    public function login($email, $password)
    {
        try {
            $query = "SELECT id, email, es_admin, username FROM " . $this->table_name . " 
                      WHERE email = :email AND contrasena = :contrasena";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contrasena', $password);

            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            //si encuentro al usuario en la base de datos, guardo los datos en mi objeto $user 
            //hash if(password_verify($password,$user['password']))
            if ($user) {
                $this->id = $user['id'];
                $this->email = $user['email'];
                $this->es_admin = $user['es_admin'];
                $this->userName = $user['username'];
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
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user=$stmt->fetch(PDO::FETCH_ASSOC);





            } catch (\Throwable $th) {
            //throw $th;
        }
    }


}