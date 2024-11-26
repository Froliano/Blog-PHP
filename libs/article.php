<?php
    function get_article($id_article, $pdo): array
    {
        $sql = "SELECT * FROM articles WHERE id_article = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id_article]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function get_articles($pdo): array
    {
        $query = $pdo->prepare("SELECT * FROM articles");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
?>