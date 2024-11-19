<?php

class Enseignant {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Récupère tous les enseignants
    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM Enseignant");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupère un enseignant par son ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Enseignant WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Ajoute un enseignant
    public function add($nom, $prenom, $email) {
        $stmt = $this->db->prepare("INSERT INTO Enseignant (nom, prenom, email) VALUES (:nom, :prenom, :email)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    // Met à jour un enseignant
    public function update($id, $nom, $prenom, $email) {
        $stmt = $this->db->prepare("UPDATE Enseignant SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    // Supprime un enseignant
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM Enseignant WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
