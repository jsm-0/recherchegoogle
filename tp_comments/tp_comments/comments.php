<?php
require 'db.php';

try {
    $stmt = $pdo->query("SELECT id, content, created_at FROM comments ORDER BY created_at DESC");
    $comments = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log($e->getMessage());
    echo "Erreur lors du chargement des commentaires.";
    exit;
}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Commentaires</title>
</head>

<body>
    <h1>Commentaires postés</h1>
    <p><a href="index.html">Poster un nouveau commentaire</a></p>

    <?php if (empty($comments)): ?>
        <p>Aucun commentaire pour le moment.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($comments as $c): ?>
                <li>
                    <div><?= htmlspecialchars($c['created_at']) ?></div>
                    <div><?= nl2br(htmlspecialchars($c['content'])) ?></div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>

</html>