<?php require '../app/Views/layouts/header.php'; ?>

<div class="container mt-5 mb-5"
     style="min-height:60vh;">

    <div class="card shadow"
     style="
        background:#1E1E1E;
        color:white;
        border-left:4px solid #D4AF37;
     ">

        <div class="card-header text-white"
     style="
        background:#121212;
        border-bottom:2px solid #D4AF37;
     ">
            <h3>Create Category</h3>

        </div>

        <div class="card-body">

            <form action="store_category.php" method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Category Name
                    </label>

                    <input
    type="text"
    name="name"
    class="form-control"
    style="
        background:#121212;
        color:white;
        border:1px solid #D4AF37;
    "
    required>

                </div>

                <button
                    type="submit"
                    class="btn btn-success">

                    Create Category

                </button>

            </form>

        </div>

    </div>

</div>

<?php require '../app/Views/layouts/footer.php'; ?>