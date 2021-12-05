<?php

class ArticleService
{
    public function getAll() {
        //retrieve data
        $articleDao = new ArticleDAO();
        $articles = $articleDao->getAll();
        return $articles;
    }
}