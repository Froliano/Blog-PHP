<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers le fichier CSS global -->
</head>

<?php
include "menu.php";
include "libs/pdo.php";
include "libs/article.php";

$articles = get_articles($pdo);
?>

<body>
    <h1 class="page-title">Liste des Articles</h1>
    <div class="news">
        <?php
        if (count($articles) > 0) {
            foreach ($articles as $article) {?>
                <div class='article-card'>
                    <h2 class='article-title'><a href='actualite.php?id=<?= $article["id_article"] ?>'> <?= $article["titre"] ?> </a></h2>
                    <p class='article-content'><?= substr($article["contenu"], 0, 150) . "..." ?></p>
                    <a href='actualite.php?id=<?= $article["id_article"] ?>' class='read-more'>Lire plus</a>
                </div>
        <?php } } else { ?>
            <p>Aucun article disponible.</p>
        <?php } ?>
    </div>
</body>
</html>
