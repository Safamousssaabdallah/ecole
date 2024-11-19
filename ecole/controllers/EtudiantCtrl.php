<?php
require_once('../models/EtudiantService.php');

$etService = new EtudiantService();
/
if (isset($_GET['action']))
    $action = $_GET['action'];
if (isset($_POST['action']))
    $action = $_POST['action'];





if ($action == 'form') {
    Header('Location:../views/Etudiant/form.php');
}

if ($action == 'liste') {
    Header('Location:../views/Etudiant/liste.php');
}

if ($action == 'delete') {
    //recuperation des donnees
    $matricule=$_GET['matricule'];

    //appel du model
    $etService->delete($matricule);

    //redirection vers la vue
    Header('Location:../views/Etudiant/liste.php?message=Etudiant supprimé');
 
}




if ($action == 'ajout') {
    //1. recupertaion de donnees
    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $ddn = $_POST['ddn'];
    $tel = $_POST['tel'];


    //2. Appel du model
    $etService->add($matricule, $nom, $prenom, $sexe, $tel, $ddn);

    //3. appel de la vue
    Header('Location:../views/Etudiant/liste.php?message=Etudiant ajouté');
}