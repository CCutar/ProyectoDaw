<?php
    include('connection.php');
    class Product {
        private $connection;
    
        public function __construct() {
            $this->connection = new Connection();
        }
        

        public function getProduct() {
            try {
                $query = "SELECT * FROM producto";
                $stmt = $this->connection->pdo->query($query);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Manejar errores de conexión o consulta
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    
        public function obtenerProductoPorID($productoID) {
            try {
                $query = "SELECT id, nombre, precio, descripcion FROM productos WHERE id = :productoID";
                $stmt = $this->connection->pdo->prepare($query);
                $stmt->bindParam(':productoID', $productoID, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Manejar errores de conexión o consulta
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }
    
?>