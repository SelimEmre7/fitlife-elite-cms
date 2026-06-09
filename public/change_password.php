<?php

session_start();

require_once '../app/Models/User.php';

if (!isset($_SESSION['user_id']))
{
    die("Please login first.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $password = $_POST['password'];

    if (strlen($password) < 6)
    {
        die("Password must be at least 6 characters.");
    }

    $userModel = new User();

    $hashedPassword = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $userModel->updatePassword(
        $_SESSION['user_id'],
        $hashedPassword
    );

    $_SESSION['success'] =
        "Password changed successfully.";

    header("Location: profile.php");
    exit;
}

require_once '../app/Views/layouts/header.php';
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

            <h3>🔒 Change Password</h3>

        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        New Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required>

                </div>

                <button
                    type="submit"
                    class="btn btn-warning">

                    Update Password

                </button>

            </form>

        </div>

    </div>

</div>

<?php require '../app/Views/layouts/footer.php'; ?>
