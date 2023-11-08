<?php
class PreferenceManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getPreferences() {
        $query = "SELECT * FROM preferencias";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePreferenceValue($id, $nuevoValor) {
        $query = "UPDATE preferencias SET valor = :nuevoValor WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nuevoValor', $nuevoValor, PDO::PARAM_STR);

        return $stmt->execute();
    }
}
?>
