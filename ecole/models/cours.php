<?php

class Cours {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Récupère tous les cours
    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM Cours");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupère un cours par son ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Cours WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Ajoute un cours
    public function add($nom, $id_enseignant, $id_ecole) {
        $stmt = $this->db->prepare("INSERT INTO Cours (nom, id_enseignant, id_ecole) VALUES (:nom, :id_enseignant, :id_ecole)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':id_enseignant', $id_enseignant);
        $stmt->bindParam(':id_ecole', $id_ecole);
        return $stmt->execute();
    }

    // Met à jour un cours
    public function update($id, $nom, $id_enseignant, $id_ecole) {
        $stmt = $this->db->prepare("UPDATE Cours SET nom = :nom, id_enseignant = :id_enseignant, id_ecole = :id_ecole WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':id_enseignant', $id_enseignant);
        $stmt->bindParam(':id_ecole', $id_ecole);
        return $stmt->execute();
    }

    // Supprime un cours
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM Cours WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
