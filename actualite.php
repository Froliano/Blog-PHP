<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers le fichier CSS global -->
</head>

<?php
include 'menu.php';
include 'libs/pdo.php';
include 'libs/article.php';
include 'libs/commentaire.php';

if (isset($_GET['id'])) 
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        if (isset($_POST['commentaire'])) 
        {
            $commentaire = $_POST['commentaire'];
            add_commentaire($_SESSION["user_id"], $_GET["id"], $commentaire, $pdo);
        }
    }
    $article = get_article($_GET['id'], $pdo);
    $commentaires = get_commentaires($_GET["id"], $pdo);
} 
else 
{
    echo "ID d'article manquant.";
}
?>

<body>
    <div class="article">
        <article class="article-content">
            <h1><?=$article['titre']?></h1>
            <p><?=nl2br($article['contenu'])?></p>
        </article>
        
        <section class="comments-section">
            <h2>Commentaires</h2>
            <ul class="comments-list">
                <?php foreach($commentaires as $commentaire) { ?>
                <li class="comment-item">
                    <h3 class="comment-author"><?= htmlspecialchars($commentaire["nom"]) . " " . htmlspecialchars($commentaire["prenom"]); ?></h3>
                    <p class="comment-body"><?= nl2br(htmlspecialchars($commentaire["commentaire"])) ?></p>
                    <p class="comment-date">Publié le <?= $commentaire["date"] ?></p>
                </li>
                <?php } ?>
            </ul>

            <h2>Ajouter un commentaire</h2>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <form method="post" class="comment-form">
                    <textarea name="commentaire" rows="4" cols="50" placeholder="Votre commentaire..." required></textarea><br>
                    <input type="submit" value="Ajouter un commentaire" class="submit-btn">
                </form>
            <?php } else { ?>
                <p>Vous devez être connecté pour ajouter un commentaire. <a href="login.php" class="login-link">Connexion</a></p>
            <?php } ?>
        </section>
    </div>
</body>
</html>
