<?php
// Paramètres de connexion à la base de données Railway
$host = 'maglev.proxy.rlwy.net';
$port = 50295;
$dbname = 'railway';
$user = 'root';
$pass = 'xdfPsRpVvZhiegOIJNFtgQRTggEPAIsj';

try {
    // Connexion à la base via PDO
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
    // Activation des erreurs PDO (affichera les erreurs SQL en développement)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Message d’erreur si la connexion échoue
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
