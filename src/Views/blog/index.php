<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini CMS</title>
</head>
<body>
<h1>Blog</h1>
<?php if (empty($posts)): ?>
    <p>No posts yet.</p>
<?php else: ?>
    <?php foreach ($posts as $post): ?>
        <article>
            <h2><?= htmlspecialchars($post['title']) ?></h2>
            <time><?= $post['created_at'] ?></time>
            <p><?= htmlspecialchars(substr($post['body'], 0, 150)) ?>...</p>
            <a href="/post/<?= htmlspecialchars($post['slug']) ?>">Read more</a>
        </article>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>