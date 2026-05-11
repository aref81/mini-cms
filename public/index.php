<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\BlogController;

$uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

match(true) {
    $uri === '/'                         => (new BlogController)->index(),
//    $uri === '/admin/login'              => (new AuthController)->login(),
//    $uri === '/admin/logout'             => (new AuthController)->logout(),
//    str_starts_with($uri, '/admin/posts')=> (new PostController)->handle($method, $uri),
    default                              => call_user_func(function() {
        http_response_code(404);
        echo "<h1>404 — Page not found</h1>";
    })
};