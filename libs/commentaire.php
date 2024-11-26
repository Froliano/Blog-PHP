<?php
    function add_commentaire($id_user, $id_article, $commentaire, $pdo): void
    {
        $sql = "INSERT INTO commentaires (id_user, id_article, commentaire, date) VALUES (:id_user, :id_article, :commentaire, :date)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([
                ":id_user" => $id_user, 
                ":id_article"=> $id_article, 
                ":commentaire" => $commentaire, 
                ":date"=>date('Y-m-d H:i:s', time())]);
        } catch (PDOException $e) {
            echo "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }

    function get_commentaires($id_article, $pdo): array
    {
        $sql = "SELECT nom, prenom, commentaire, date
                FROM commentaires
                JOIN user on user.id_user = commentaires.id_user
                WHERE commentaires.id_article = :id_article;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id_article' => $id_article]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
?>