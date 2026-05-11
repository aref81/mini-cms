<?php

class BlogController {
    public function index(): void {
        $posts = [];
        require __DIR__ . '/../Views/blog/index.php';
    }
}