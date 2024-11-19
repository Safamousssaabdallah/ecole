<?php

require_once '../app/models/Cours.php';
require_once '../app/views/CoursView.php';

class CoursController extends Controller {
    public function __construct() {
        parent::__construct(new Cours($this->db), new CoursView());
    }

    // Affiche tous les cours
    public function index() {
        $cours = $this->model->getAll();
        $this->view->render($cours);
    }

    // Affiche les détails d'un cours par son ID
    public function show($id) {
        $cours = $this->model->getById($id);
        $this->view->render($cours);
    }

    // Affiche le formulaire de création d'un cours
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collecte des données du formulaire
            $nom = $_POST['nom'];
            $id_enseignant = $_POST['id_enseignant'];
            $id_ecole = $_POST['id_ecole'];

            // Ajoute le cours dans la base de données
            $this->model->add($nom, $id_enseignant, $id_ecole);
            header('Location: /cours');
        } else {
            $this->view->showForm();
        }
    }

    // Met à jour un cours existant
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collecte des données du formulaire
            $nom = $_POST['nom'];
            $id_enseignant = $_POST['id_enseignant'];
            $id_ecole = $_POST['id_ecole'];

            // Met à jour le cours dans la base de données
            $this->model->update($id, $nom, $id_enseignant, $id_ecole);
            header('Location: /cours');
        } else {
            $cours = $this->model->getById($id);
            $this->view->showForm($cours);
        }
    }

    // Supprime un cours
    public function delete($id) {
        $this->model->delete($id);
        header('Location: /cours');
    }
}
