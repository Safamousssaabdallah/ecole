<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification etudiant</title>
</head>
<body>
<h1>Formulaire modification enseignant</h1>
  
    <form action="../../controllers/EtudiantCtrl.php" method="post">
    <table  align="center">
        <tr>
            <td>MATRICULE</td>
            <td><input type="text" name="matricule" autocomplete="off" required></td>
        </tr>
        <tr>
            <td>NOM</td>
            <td><input type="text" name="nom" autocomplete="off" required></td>
        </tr>
        <tr>
            <td>PRENOM</td>
            <td><input type="text" name="prenom" required></td>
        </tr>
        <tr>
            <td>SEXE</td>
            <td>
               <!-- H <input type="radio" name="sexe"> 
                F <input type="radio" name="sexe"> -->

                <select name="sexe" required>
                    <option value="">Veuillez choisir le sexe de l'enseignant</option>
                    <option value="H">Homme</option>
                    <option value="F">Femme</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>TEL</td>
            <td><input type="number" name="tel" required></td>
        </tr>
        <tr>
            <td>DATE DE NAISSANCE</td>
            <td><input type="date" name="ddn" required></td>
        </tr>
        <tr>
            <input type="hidden" name="action" value="ajout">
            <td colspan="2" style="text-align: center">  
<input type='reset' style="background-color: red; color: white" value="VIDER"> 
&nbsp; &nbsp; &nbsp;&nbsp;
<input type='submit' style="background-color: green; color: white" value="AJOUTER"></td>
        </tr>
    </table>
    </form>
</body>
</html>