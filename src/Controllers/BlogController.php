<?php

require_once __DIR__ . '/../Models/PostModel.php';

class BlogController {
    public function index(): void {
        $posts = (new PostModel)->all();
        require __DIR__ . '/../Views/blog/index.php';
    }
}