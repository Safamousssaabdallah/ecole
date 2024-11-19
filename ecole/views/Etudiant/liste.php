<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Liste des étudiants</h1>
<a href="../../controllers/EtudiantCtrl.php?action=form" >Go to students form</a> <br >
<?php 
        if(isset($_GET['message'])){
            ?>
              <span style="color: green; font-size: large"><?php echo $_GET['message']; ?></span>
        <?php }
    ?>

<?php
require_once('../../models/EtudiantService.php');
$etService=new EtudiantService();
$etudiants=$etService->getAll();
?>    


<table border="1" align="center">
    <tr>
    <th>MATRICULE</th><th>NOM</th><th>PRENOM</th><th>SEXE</th><th>TELEPHONE</th><th>DATE DE NAISSANCE</th><th>ACTIONS</th>
    </tr>
    <?php
foreach($etudiants as $et){
 ?>   
    <tr>
    <td><?php echo $et['matricule']; ?></td>
    <td><?php echo $et['nom']; ?></td>
    <td><?php echo $et['prenom']; ?></td>
    <td><?php echo $et['sexe']; ?></td>
    <td><?php echo $et['tel']; ?></td>
    <td><?php echo $et['ddn']; ?></td>
    <td><input form="f1" type="submit" value="MODIFIER" />--<a href="../../controllers/EtudiantCtrl.php?action=delete&matricule=<?php echo $et['matricule']; ?>"   onClick="return window.confirm('Etes-vous sûre de vouloir supprimer cet étudiant')">SUPPRIMER</a></td>
    </tr>
<?php } ?>
   
</table>


<form action="test.php" method="GET" id="f1"></form>
</body>
</html>