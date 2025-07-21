<?php
// Paramètres de connexion à la base de données
$host = 'localhost';
$dbname = 'fermeDesAmandiers';
$user = 'root';       // à adapter selon votre configuration
$pass = 'admin';           // mot de passe, souvent vide sous XAMPP

try {
    // Connexion à la base via PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

    // Activation des erreurs PDO (affichera les erreurs SQL en développement)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Message d’erreur si la connexion échoue
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
