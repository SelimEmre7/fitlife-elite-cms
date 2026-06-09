<?php

session_start();

require_once '../app/Models/User.php';
require_once '../app/Models/Post.php';


if (!isset($_SESSION['user_id']))
{
    die("Please login first.");
}

$userModel = new User();

$user = $userModel->findById(
    $_SESSION['user_id']
);

$postModel = new Post();

$userPosts = $postModel->getByUser(
    $_SESSION['user_id']
);


require_once '../app/Views/layouts/header.php';
?>

<div class="container mt-5">

    <div class="card shadow"
         style="background:#1E1E1E;
                color:white;
                border-left:4px solid #D4AF37;">

        <div class="card-body">

            <h1 class="text-warning">
                👤 My Profile
            </h1>

            <hr>

            <p>
                <strong>Username:</strong>
                <?= htmlspecialchars($user['username']) ?>
            </p>

            <p>
                <strong>Email:</strong>
                <?= htmlspecialchars($user['email']) ?>
            </p>

            <p>
                <strong>User ID:</strong>
                <?= $user['id'] ?>
            </p>
        
<a href="change_password.php"
   class="btn btn-warning mt-3">

    🔒 Change Password

</a>

<hr>

<h3 class="text-warning mt-4">
    📝 My Posts
</h3>

<?php if(empty($userPosts)): ?>

    <div class="alert alert-secondary">

        No posts created yet.

    </div>

<?php else: ?>

    <?php foreach($userPosts as $post): ?>

        <div class="card mb-3"
             style="
                background:#121212;
                color:white;
                border-left:3px solid #D4AF37;
             ">

            <div class="card-body">

                <h5>
                    <?= htmlspecialchars($post['title']) ?>
                </h5>

                <a href="post.php?id=<?= $post['id'] ?>"
                   class="btn btn-warning btn-sm">

                    View Post

                </a>

            </div>

        </div>

    <?php endforeach; ?>

<?php endif; ?>

        </div>

    </div>

</div>

<?php require '../app/Views/layouts/footer.php'; ?>