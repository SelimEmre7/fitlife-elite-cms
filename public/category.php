<?php

require_once '../app/Models/Post.php';
require_once '../app/Views/layouts/header.php';

$categoryId = $_GET['id'] ?? 0;

$postModel = new Post();

$posts = $postModel->getByCategory($categoryId);
?>

<div class="container mt-5">

    <div class="card shadow"
         style="
            background:#1E1E1E;
            color:white;
            border-left:4px solid #D4AF37;
         ">

        <div class="card-header"
             style="
                background:#121212;
                color:#D4AF37;
             ">

            <h3>🏷 Category Posts</h3>

        </div>

        <div class="card-body">

            <?php if(empty($posts)): ?>

                <div class="alert alert-warning">
                    No posts found in this category.
                </div>

            <?php else: ?>

                <?php foreach($posts as $post): ?>

                    <div class="mb-4 p-3 rounded"
                         style="
                            background:#121212;
                            border-left:3px solid #D4AF37;
                         ">

                        <h4>
                            <?= htmlspecialchars($post['title']) ?>
                        </h4>

                        <p>
                            <?= htmlspecialchars(substr($post['content'], 0, 200)) ?>
                        </p>

                        <a href="post.php?id=<?= $post['id'] ?>"
                           class="btn btn-warning btn-sm">

                            Read More

                        </a>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php require_once '../app/Views/layouts/footer.php'; ?>