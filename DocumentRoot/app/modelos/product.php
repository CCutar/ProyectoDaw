<?php
    include('Connection.php');
    class Product {
        private $conn;
        private $id;
        private $nombre_producto;
        private $descripcion_producto;
        private $precio;
        private $margen_porcentaje;
        private $table_name="producto";
    
        public function __construct() {
            $connection= new Connection();
            $this->conn = $connection->connect();
            
        }
        

        public function getProducts() {
            try {
                $query = "SELECT * FROM producto";
                $stmt = $this->conn->prepare($query);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Manejar errores de conexión o consulta
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        public function updateProduct($productoID){
            try {
                $query = "SELECT * FROM producto";
                $stmt = $this->conn->prepare($query);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Manejar errores de conexión o consulta
                echo "Error: " . $e->getMessage();
                return false;
            }

        }

        // Método para eliminar un producto por su ID
        public function deleteProduct($productoID) {
            try {
                $query = "DELETE FROM producto WHERE id = :productoID";
                $stmt = $this->connection->pdo->prepare($query);
                $stmt->bindParam(':productoID', $productoID, PDO::PARAM_INT);
                $stmt->execute();
                return true; // Éxito al eliminar
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false; // Error al eliminar
            }
        }
    }
    
?>