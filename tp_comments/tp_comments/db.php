<?php
$host = '127.0.0.1';
$db   = 'tp_comments';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    // Activer l'affichage des erreurs uniquement en dev, ou mieux, le logger
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Ne pas afficher l'erreur brute en production
    error_log($e->getMessage());
    die("Erreur de connexion à la base de données.");
}
?>
