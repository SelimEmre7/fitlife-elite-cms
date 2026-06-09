<?php require '../app/Views/layouts/header.php'; ?>

<?php

if (!isset($_SESSION))
{
    session_start();
}

if (!isset($_SESSION['csrf_token']))
{
    $_SESSION['csrf_token'] =
        bin2hex(random_bytes(32));
}
?>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header"
     style="
        background:#121212;
        color:#D4AF37;
        border-bottom:1px solid #D4AF37;
     ">

    <h3>➕ Create New Post</h3>

 </div>

        <div class="card-body">

            <form action="store_post.php" method="POST">

<input
    type="hidden"
    name="csrf_token"
    value="<?= $_SESSION['csrf_token'] ?>">


                <div class="mb-3">

                    <label class="form-label">
                        Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Category
                    </label>

                    <select
                        name="category_id"
                        class="form-select"
                        required>

                        <option value="">
                            Select Category
                        </option>

                        <?php if(!empty($categories)): ?>

                            <?php foreach($categories as $category): ?>

                                <option value="<?= $category['id'] ?>">

                                    <?= htmlspecialchars($category['name']) ?>

                                </option>

                            <?php endforeach; ?>

                        <?php endif; ?>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Content
                    </label>

                    <textarea
                        name="content"
                        rows="8"
                        class="form-control"
                        required></textarea>

                </div>
                   <button
                   type="submit"
                   class="btn btn-warning">
 
                    Publish Post

                </button>

            </form>

        </div>

    </div>

</div>

<?php require '../app/Views/layouts/footer.php'; ?>