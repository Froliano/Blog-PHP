<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers le fichier CSS -->
</head>
<?php session_start(); ?>
<body>
    <nav class="navbar">
        <ul class="nav-list left-links">
            <li class="nav-item">
                <a href="news.php" class="nav-link">News</a>
            </li>
            <li class="nav-item">
                <a href="index.php" class="nav-link">Home</a>
            </li>
        </ul>
        <ul class="nav-list right-links">
            <?php if (isset($_SESSION["user_id"])) { ?>
            <li class="nav-item">
                <a href="logout.php" class="nav-link">Logout</a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
                <a href="login.php" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                <a href="inscription.php" class="nav-link">Inscription</a>
            </li>
            <?php } ?>
        </ul>
    </nav>
</body>
</html>
