<?php
require __DIR__ . '/base.php';
require __DIR__ . '/../models/article.php';

class ArticleDAO extends Base
{
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT id, title, content, author, datetime
                                                FROM articles");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
            $articles = $stmt->fetchAll();
            return $articles;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}