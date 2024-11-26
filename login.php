<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers le CSS -->
</head>
<?php
    include "menu.php";
    include "libs/pdo.php";
    include "libs/user.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $email = htmlspecialchars($_POST['email']);
        $mdp = $_POST['mdp'];

        $user = verify_connexion($email, $mdp, $pdo);
    
        if ($user) 
        {
            $_SESSION['user_id'] = $user['id_user'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['email'] = $user['email'];
            header('Location:news.php');
        } else 
        {
            echo "<p class='error'>Email ou mot de passe incorrect.</p>";
        }
    }
?>
<body>
    <div class="container">
        <h2 class="form-title">Page de connexion</h2>
        <form method="POST" class="login-form">
            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="mdp" class="form-label">Mot de passe:</label>
                <input type="password" id="mdp" name="mdp" class="form-input" required>
            </div>

            <button type="submit" class="form-button">Se connecter</button>
        </form>
    </div>
</body>
</html>
