<?php

class ArticleController {

    private $articleService;

    public function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function index() {
        $articles = $this->articleService->getAll();
        header("Location: views/index.php");
    }
}