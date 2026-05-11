<?php

namespace App\Models;

use PDO;
class PostModel {
    private PDO $db;

    public function __construct() {
        $this->db = require __DIR__ . '/../../config/database.php';
    }

    public function all(): array {
        $stmt = $this->db->query(
            "SELECT * FROM posts WHERE status = 'published' ORDER BY created_at DESC"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(string $slug): array|false {
        $stmt = $this->db->prepare(
            "SELECT * FROM posts WHERE slug = ? AND status = 'published'"
        );
        $stmt->execute([$slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}