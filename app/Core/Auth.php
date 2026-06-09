<?php

class Auth
{
    public static function requireLogin()
    {
        if (!isset($_SESSION['user_id']))
        {
            header("Location: login.php");
            exit;
        }
    }

    public static function requireAdmin()
    {
        if (
            !isset($_SESSION['role']) ||
            $_SESSION['role'] !== 'admin'
        )
        {
            die("Access denied.");
        }
    }
}
