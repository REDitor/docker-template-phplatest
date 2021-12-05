<?php
require __DIR__ . '/../services/articleservice.php';

class ArticleController {

    private $articleService;

    public function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function index() {
        $articles = $this->articleService->getAll();
        require __DIR__ . '/../views/article/index.php';
    }
}