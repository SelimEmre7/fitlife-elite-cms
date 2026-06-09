<?php require '../app/Views/layouts/header.php'; ?>

<div class="container mt-5">

    <div class="card shadow"
         style="background:#1E1E1E;color:white;border-left:4px solid #D4AF37;">

        <div class="card-body">

            <h1 style="color:#D4AF37;">
                <?= htmlspecialchars($post['title']) ?>
            </h1>

            <hr style="border-color:#D4AF37;">

            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>

        </div>

        <div class="card-footer"
             style="background:#121212;">

            <small style="color:#D4AF37;">

                Published:
                <?= $post['created_at'] ?>

            </small>

        </div>

    </div>

    <div class="card mt-4 shadow"
         style="background:#1E1E1E;color:white;">

        <div class="card-header">

            <h4>💬 Comments</h4>

        </div>

        <div class="card-body">

            <form action="store_comment.php"
                  method="POST">

                <input
                    type="hidden"
                    name="post_id"
                    value="<?= $post['id'] ?>">

                <div class="mb-3">

                    <textarea
                        name="content"
                        class="form-control"
                        rows="4"
                        placeholder="Write your comment..."
                        required></textarea>

                </div>

                <button
                    type="submit"
                    class="btn btn-warning">

                    Add Comment

                </button>

            </form>

        </div>

    </div>

    <div class="card mt-4 shadow"
         style="background:#1E1E1E;color:white;">

        <div class="card-header">

            <h4>All Comments</h4>

        </div>

        <div class="card-body">

            <?php if(empty($comments)): ?>

                <p>No comments yet.</p>

            <?php else: ?>

                <?php foreach($comments as $comment): ?>

                    <div class="mb-3 p-3"
                         style="border-bottom:1px solid #444;">

                        <strong style="color:#D4AF37;">

                            <?= htmlspecialchars($comment['username']) ?>

                        </strong>

                        <br><br>

                        <?= nl2br(htmlspecialchars($comment['content'])) ?>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php require '../app/Views/layouts/footer.php'; ?>

