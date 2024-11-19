<?php

require_once '../app/models/Enseignant.php';
require_once '../app/views/EnseignantView.php';

class EnseignantController extends Controller {
    public function __construct() {
        parent::__construct(new Enseignant($this->db), new EnseignantView());
    }

    // Affiche tous les enseignants
    public function index() {
        $enseignants = $this->model->getAll();
        $this->view->render($enseignants);
    }

    // Affiche les détails d'un enseignant par son ID
    public function show($id) {
        $enseignant = $this->model->getById($id);
        $this->view->render($enseignant);
    }

    // Affiche le formulaire de création d'un enseignant
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collecte des données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];

            // Ajoute l'enseignant dans la base de données
            $this->model->add($nom, $prenom, $email);
            header('Location: /enseignant');
        } else {
            $this->view->showForm();
        }
    }

    // Met à jour un enseignant existant
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collecte des données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];

            // Met à jour l'enseignant dans la base de données
            $this->model->update($id, $nom, $prenom, $email);
            header('Location: /enseignant');
        } else {
            $enseignant = $this->model->getById($id);
            $this->view->showForm($enseignant);
        }
    }

    // Supprime un enseignant
    public function delete($id) {
        $this->model->delete($id);
        header('Location: /enseignant');
    }
}
