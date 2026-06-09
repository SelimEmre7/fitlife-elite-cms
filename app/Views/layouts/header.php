<?php
if (session_status() === PHP_SESSION_NONE)
{
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>FITLIFE ELITE</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body style="background:#0f0f0f;">

<nav class="navbar navbar-expand-lg navbar-dark"
     style="
        background:#121212;
        border-bottom:2px solid #D4AF37;
     ">

    <div class="container">

        <a class="navbar-brand fw-bold"
           href="index.php"
           style="color:#D4AF37;">

            🏆 FITLIFE ELITE

        </a>

        <div class="d-flex align-items-center">

<button
    id="themeToggle"
    class="btn btn-outline-warning btn-sm me-2">

    🌙 Theme

</button>


            <?php if(isset($_SESSION['username'])): ?>

                <a href="dashboard.php"
                   class="btn btn-outline-warning btn-sm me-2">

                    Dashboard

                </a>

                <a href="profile.php"
                   class="btn btn-outline-warning btn-sm me-2">

                    Profile

                </a>

                <a href="categories.php"
                   class="btn btn-outline-warning btn-sm me-2">

                    Categories

                </a>

                <?php if(
                    isset($_SESSION['role']) &&
                    $_SESSION['role'] === 'admin'
                ): ?>

                    <a href="admin.php"
                       class="btn btn-warning btn-sm me-2">

                        Admin Panel

                    </a>

                <?php endif; ?>

                <span class="me-3"
                      style="color:#D4AF37;">

                    Welcome,
                    <?= htmlspecialchars($_SESSION['username']) ?>

                </span>

                <a href="logout.php"
                   class="btn btn-warning btn-sm">

                    Logout

                </a>

            <?php else: ?>

                <a href="login.php"
                   class="btn btn-outline-warning btn-sm me-2">

                    Login

                </a>

                <a href="register.php"
                   class="btn btn-warning btn-sm">

                    Register

                </a>

            <?php endif; ?>

        </div>

    </div>

</nav>

<script>

document.addEventListener(
    "DOMContentLoaded",
    function()
    {
        const toggle =
            document.getElementById(
                "themeToggle"
            );

        const savedTheme =
            localStorage.getItem(
                "theme"
            );

        if(savedTheme === "light")
        {
            document.body.style.background =
                "#f8f9fa";

            document.body.style.color =
                "#000";
        }

        if(toggle)
        {
            toggle.addEventListener(
                "click",
                function()
                {
                    if(
                        localStorage.getItem(
                            "theme"
                        ) === "light"
                    )
                    {
                        localStorage.setItem(
                            "theme",
                            "dark"
                        );

                        document.body.style.background =
                            "#0f0f0f";

                        document.body.style.color =
                            "#fff";
                    }
                    else
                    {
                        localStorage.setItem(
                            "theme",
                            "light"
                        );

                        document.body.style.background =
                            "#f8f9fa";

                        document.body.style.color =
                            "#000";
                    }
                }
            );
        }
    }
);

</script>

