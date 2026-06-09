<?php require '../app/Views/layouts/header.php'; ?>

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

            <h3>🏷 Categories</h3>

        </div>

        <div class="card-body">

            <?php if(empty($categories)): ?>

                <p>No categories found.</p>

            <?php else: ?>

                <?php foreach($categories as $category): ?>

                    <div class="mb-3 p-3 rounded"
                         style="
                            background:#121212;
                            border-left:3px solid #D4AF37;
                         ">

                        <a href="category.php?id=<?= $category['id'] ?>"
                           style="
                              color:white;
                              text-decoration:none;
                              font-weight:bold;
                           ">

                            🏷 <?= htmlspecialchars($category['name']) ?>

                        </a>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php require '../app/Views/layouts/footer.php'; ?>
