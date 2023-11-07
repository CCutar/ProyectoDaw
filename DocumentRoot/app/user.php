<?php
    private $conexion;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function autenticar($email, $contrasena) {
        try {
            $query = "SELECT id, nombre, email FROM usuarios WHERE email = :email AND contrasena = :contrasena";
            $stmt = $this->conexion->pdo->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                // Usuario autenticado con éxito
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                return $usuario;
            } else {
                // Usuario no autenticado
                return false;
            }
        } catch (PDOException $e) {
            // Manejar errores de conexión o consulta
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

?>