<?php

require_once '../app/Models/Post.php';
require_once '../app/Models/User.php';
require_once '../app/Models/Comment.php';

$post = new Post();
$user = new User();
$comment = new Comment();

$totalPosts = $post->countAll();
$totalUsers = $user->countAll();
$totalComments = $comment->countAll();

require_once '../app/Views/layouts/header.php';
?>

<div class="container mt-5">

    <h1 class="text-warning text-center mb-5">
        📊 Dashboard
    </h1>

    <div class="row">

        <div class="col-md-4">
            <div class="card text-center shadow"
                 style="background:#1E1E1E;color:white;">
                <div class="card-body">
                    <h2>📄</h2>
                    <h1><?= $totalPosts ?></h1>
                    <p>Total Posts</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow"
                 style="background:#1E1E1E;color:white;">
                <div class="card-body">
                    <h2>👤</h2>
                    <h1><?= $totalUsers ?></h1>
                    <p>Total Users</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow"
                 style="background:#1E1E1E;color:white;">
                <div class="card-body">
                    <h2>💬</h2>
                    <h1><?= $totalComments ?></h1>
                    <p>Total Comments</p>
                </div>
            </div>
        </div>

    </div>

</div>

<?php require_once '../app/Views/layouts/footer.php'; ?>