<?php
    function verify_connexion($email, $mdp, $pdo): array | bool 
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(mode: PDO::FETCH_ASSOC);
    
        if ($user && password_verify($mdp, $user['mdp'])) 
        {
            return $user;
        }
        else
        {
            return false;
        }
    }

    function add_user($nom, $prenom, $email, $mdp, $pdo): bool
    {
        $sql = "INSERT INTO user (nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':email' => $email,
                ':mdp' => $mdp
            ]);

            return true;
        } catch (PDOException $e) 
        {
            return false;
        }
    }
?>