<?php
// core/Database.php
class Database {
    private $host = 'localhost';
    private $db_name = 'nom_de_votre_base';
    private $username = 'votre_utilisateur';
    private $password = 'votre_mot_de_passe';
    private $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
