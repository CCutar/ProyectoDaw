<?php
class Connection {
    public $pdo;
    private $db_host = 'mariadb';
    private $db_user = 'super';
    private $db_pass = 'super';
    private $db_name = 'testdatabase';

    public function __construct(){
        try {
            $this->pdo = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        }
    }
}

?>