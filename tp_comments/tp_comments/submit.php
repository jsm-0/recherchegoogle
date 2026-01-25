<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validation : on supprime les espaces inutiles avec trim()
    $content = trim($_POST["content"] ?? "");

    // On vérifie que le message n'est pas vide
    if (!empty($content)) {
        try {
            // CORRECTION : Utilisation de requêtes préparées pour éviter l'injection SQL
            $stmt = $pdo->prepare("INSERT INTO comments (content) VALUES (:content)");
            $stmt->execute([':content' => $content]);

            header("Location: comments.php");
            exit;
        } catch (PDOException $e) {
            // CORRECTION : On loggue l'erreur et on n'affiche rien de sensible à l'utilisateur
            error_log($e->getMessage());
            echo "Une erreur est survenue lors de l'enregistrement de votre commentaire.";
        }
    } else {
        // Si le message est vide, on redirige simplement
        header("Location: comments.php");
        exit;
    }

} else {
    header("Location: index.html");
    exit;
}
?>