<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    
</head>
<?php

include "menu.php";
include "libs/pdo.php";
include "libs/user.php";

$string = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = password_hash(htmlspecialchars($_POST['mdp']), PASSWORD_DEFAULT);

    $inscription = add_user($nom, $prenom, $email, $mdp, $pdo);

    if ($inscription) 
    {
        header('Location:login.php');
    }
    else
    {
        $string = "Erreur lors de l'incription";
    }
}
?>

<body>
    <div class="container">
        <h2 class="error"><?=$string?></h2> <!-- Affichage du message d'erreur si nécessaire -->
        <h1 class="form-title">Formulaire d'inscription</h1> <!-- Titre du formulaire -->
        <form method="POST" class="signup-form">
            <!-- Champ Nom -->
            <div class="form-group">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" id="nom" name="nom" class="form-input" required>
            </div>

            <!-- Champ Prénom -->
            <div class="form-group">
                <label for="prenom" class="form-label">Prénom:</label>
                <input type="text" id="prenom" name="prenom" class="form-input" required>
            </div>

            <!-- Champ Email -->
            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-input" required>
            </div>

            <!-- Champ Mot de passe -->
            <div class="form-group">
                <label for="mdp" class="form-label">Mot de passe:</label>
                <input type="password" id="mdp" name="mdp" class="form-input" required>
            </div>

            <!-- Bouton d'envoi -->
            <button type="submit" class="form-button">S'inscrire</button>
        </form>
    </div>
</body>
</html>

