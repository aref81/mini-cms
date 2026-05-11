<?php

namespace App\Controllers;

use App\Models\PostModel;

class BlogController {
    public function index(): void {
        $posts = (new PostModel)->all();
        require __DIR__ . '/../Views/blog/index.php';
    }
}