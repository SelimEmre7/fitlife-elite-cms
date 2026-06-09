<?php require '../app/Views/layouts/header.php'; ?>

<div class="container mt-5">

<?php if(isset($_SESSION['success'])): ?>

    <div class="alert alert-success alert-dismissible fade show">

        <?= $_SESSION['success']; ?>

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

    <?php unset($_SESSION['success']); ?>

<?php endif; ?>

    <div class="p-5 rounded mb-5 text-white"
         style="background:linear-gradient(135deg,#121212,#D4AF37);">

        <div class="row align-items-center">

            <div class="col-md-8">

                <h1 class="display-3 fw-bold">
                    🏆 UNLOCK YOUR ELITE POTENTIAL
                </h1>

                <p class="lead mt-3">
                    Premium fitness knowledge, workout plans,
                    nutrition strategies and elite performance tips.
                </p>

                <a href="create_post.php"
                   class="btn btn-warning btn-lg">
                    ➕ Create New Post
                </a>

            </div>

            <div class="col-md-4 text-center">

                <div style="font-size:120px;">
                    💪
                </div>

            </div>

        </div>

    </div>

    <div class="card mb-4 shadow"
         style="background:#1E1E1E;border-left:4px solid #D4AF37;">

        <div class="card-body">

            <form action="index.php" method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="keyword"
                        class="form-control"
                        placeholder="🔍 Search articles...">

                    <button
                        type="submit"
                        class="btn btn-warning">

                        Search

                    </button>

                </div>

            </form>

        </div>

    </div>

    <div class="row mb-5">

        <div class="col-md-3 mb-3">
            <div class="card text-center shadow"
                 style="background:#1E1E1E;color:white;border-top:4px solid #D4AF37;">
                <div class="card-body">
                    <h2>🏋</h2>
                    <h3>150+</h3>
                    <p>Articles</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center shadow"
                 style="background:#1E1E1E;color:white;border-top:4px solid #D4AF37;">
                <div class="card-body">
                    <h2>👥</h2>
                    <h3>500+</h3>
                    <p>Members</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center shadow"
                 style="background:#1E1E1E;color:white;border-top:4px solid #D4AF37;">
                <div class="card-body">
                    <h2>🥇</h2>
                    <h3>25+</h3>
                    <p>Categories</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center shadow"
                 style="background:#1E1E1E;color:white;border-top:4px solid #D4AF37;">
                <div class="card-body">
                    <h2>💬</h2>
                    <h3>1200+</h3>
                    <p>Comments</p>
                </div>
            </div>
        </div>

    </div>

    <?php if(empty($posts)): ?>

        <div class="alert alert-warning text-center">

            🔍 No articles found.

        </div>

    <?php endif; ?>

    <div class="row">

        <?php foreach($posts as $post): ?>

            <div class="col-md-6 mb-4">

                <div class="card shadow h-100"
                     style="background:#1E1E1E;color:white;border-left:4px solid #D4AF37;">

                    <div class="card-body">

                        <h3>
                            <?= htmlspecialchars($post['title']) ?>
                        </h3>

                        <p>
                            <?= nl2br(htmlspecialchars($post['content'])) ?>
                        </p>

                    </div>

                    <div class="card-footer d-flex justify-content-between align-items-center"
                         style="background:#121212;">

                        <small style="color:#D4AF37;">
                            Published:
                            <?= $post['created_at'] ?>

                            <br>

                            👁 <?= $post['views'] ?>
                        </small>

                        <div>

                            <a href="post.php?id=<?= $post['id'] ?>"
                               class="btn btn-warning btn-sm">
                                Read More
                            </a>

                            <a href="edit_post.php?id=<?= $post['id'] ?>"
                               class="btn btn-outline-warning btn-sm">
                                Edit
                            </a>

                            <a href="delete_post.php?id=<?= $post['id'] ?>"
                               class="btn btn-outline-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this post?');">
                               Delete
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

    <?php if(isset($totalPages) && $totalPages > 1): ?>

        <style>
            .pagination .page-link {
                background:#121212;
                color:#D4AF37;
                border:1px solid #D4AF37;
            }
            .pagination .page-link:hover {
                background:#D4AF37;
                color:#121212;
            }
            .pagination .active .page-link {
                background:#D4AF37;
                color:#121212;
                border-color:#D4AF37;
            }
        </style>

        <nav class="mt-4">

            <ul class="pagination justify-content-center">

                <?php for($i = 1; $i <= $totalPages; $i++): ?>

                    <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">

                        <a class="page-link"
                           href="?page=<?= $i ?>">

                            <?= $i ?>

                        </a>

                    </li>

                <?php endfor; ?>

            </ul>

        </nav>

    <?php endif; ?>

</div>

<?php require '../app/Views/layouts/footer.php'; ?>