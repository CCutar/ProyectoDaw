<?php
// Incluir el archivo de conexión a la base de datos (db.php)
include('db.php');

class Login {
    private $connection;

    public function __construct($connection){
        $this->connection = $connection;
    }

    public function authenticateUser($username, $pass){
        try {    
            $query = "SELECT email, contrasena FROM usuario WHERE email = :username AND contrasena = :pass ";
            $stmt = $this->connection->pdo->prepare($query);
        
            // Enlazar los parámetros
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
            
            $stmt->execute();
        
            // Verificar si se encontró un registro
            if ($stmt->rowCount() == 1) {
                // Inicio de sesión exitoso
                include('main.php'); // Redirige a la página de inicio después del inicio de sesión exitoso
                die();
            } else {
                // Inicio de sesión fallido
                //header('Location: index.php?fallo=true');
                die();
            }
        } catch (PDOException $e) {
            // Manejar errores de conexión o consulta
            echo "Error: " . $e->getMessage();
        }
        }
    }
    // Crear una instancia de la clase Conexion
    $connection = new Connection();

    // Crear una instancia de la clase Autenticacion pasando la conexión
    $autenticateUser = new Login($connection);


    // Recuperar los datos del formulario
    $username = htmlspecialchars($_POST['name']);
    $pass = htmlspecialchars($_POST['password']);

    // Ejemplo de uso
    $autenticateUser->authenticateUser($username, $pass);

?>