<?php require '../app/Views/layouts/header.php'; ?>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning">

            <h3>Edit Post</h3>

        </div>

        <div class="card-body">

            <form action="update_post.php" method="POST">

                <input
                    type="hidden"
                    name="id"
                    value="<?= $post['id'] ?>">

                <div class="mb-3">

                    <label>Title</label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="<?= htmlspecialchars($post['title']) ?>"
                        required>

                </div>

                <div class="mb-3">

                    <label>Content</label>

                    <textarea
                        name="content"
                        rows="8"
                        class="form-control"
                        required><?= htmlspecialchars($post['content']) ?></textarea>

                </div>

                <button
                    type="submit"
                    class="btn btn-warning">

                    Update Post

                </button>

            </form>

        </div>

    </div>

</div>

<?php require '../app/Views/layouts/footer.php'; ?>