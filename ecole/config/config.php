<?php
// Configuration de la base de données
define('DB_HOST', 'localhost');    // Hôte de la base de données
define('DB_NAME', 'nom_de_la_base'); // Nom de la base de données
define('DB_USER', 'utilisateur');    // Utilisateur de la base de données
define('DB_PASS', 'mot_de_passe');   // Mot de passe de la base de données

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );
    // Définir le mode d'erreur de PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si la connexion échoue, afficher un message d'erreur
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
