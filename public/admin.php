<?php

session_start();

require_once '../app/Core/Auth.php';

Auth::requireAdmin();

require_once '../app/Models/Post.php';
require_once '../app/Models/User.php';
require_once '../app/Models/Category.php';
require_once '../app/Views/layouts/header.php';

$postModel = new Post();
$userModel = new User();
$users = $userModel->getAll();
$categoryModel = new Category();

$totalPosts = $postModel->countAll();
$totalUsers = $userModel->countAll();
$totalCategories = $categoryModel->countAll();

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

            <h2>👑 Admin Panel</h2>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 mb-3">

                    <div class="card text-center bg-dark text-white">

                        <div class="card-body">

                            <h1>
                                <?= $totalPosts ?>
                            </h1>

                            <p>Total Posts</p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="card text-center bg-dark text-white">

                        <div class="card-body">

                            <h1>
                                <?= $totalUsers ?>
                            </h1>

                            <p>Total Users</p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="card text-center bg-dark text-white">

                        <div class="card-body">

                            <h1>
                                <?= $totalCategories ?>
                            </h1>

                            <p>Total Categories</p>

                        </div>

                    </div>

                </div>

            </div>

            <hr style="border-color:#D4AF37;">

            <div class="row">

                <div class="col-md-4 mb-3">

                    <a href="create_post.php"
                       class="btn btn-warning w-100">

                        ➕ Create Post

                    </a>

                </div>

                <div class="col-md-4 mb-3">

                    <a href="create_category.php"
                       class="btn btn-warning w-100">

                        🏷 Create Category

                    </a>

                </div>

                <div class="col-md-4 mb-3">

                    <a href="categories.php"
                       class="btn btn-warning w-100">

                        📂 View Categories

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<hr style="border-color:#D4AF37;">

<h3 class="mt-4 mb-3">
    👥 User Management
</h3>

<div class="table-responsive">

    <table class="table table-dark table-striped">

        <thead>

            <tr>

                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach($users as $user): ?>

                <tr>

                    <td><?= $user['id'] ?></td>

                    <td>
                        <?= htmlspecialchars($user['username']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($user['email']) ?>
                    </td>

                    <td>

                        <?php if($user['role'] === 'admin'): ?>

                            <span class="badge bg-warning text-dark">
                                Admin
                            </span>

                        <?php else: ?>

                            <span class="badge bg-secondary">
                                User
                            </span>

                        <?php endif; ?>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?php require_once '../app/Views/layouts/footer.php'; ?>
