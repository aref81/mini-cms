<?php

$host = getenv('DB_HOST') ?: 'db';
$db   = getenv('DB_NAME') ?: 'minicms';
$user = getenv('DB_USER') ?: 'cms';
$pass = getenv('DB_PASS') ?: 'secret';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to database.\n";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage() . "\n");
}

$migrations = glob(__DIR__ . '/sql/*.sql');
sort($migrations);

foreach ($migrations as $file) {
    $name = basename($file);
    $sql = file_get_contents($file);
    try {
        $pdo->exec($sql);
        echo "✓ Ran: $name\n";
    } catch (PDOException $e) {
        echo "✗ Failed: $name — " . $e->getMessage() . "\n";
    }
}

echo "Done.\n";