<?php

require_once '../app/Core/Controller.php';
require_once '../app/Models/User.php';

class AuthController extends Controller
{
    public function register()
    {
        $this->view('auth/register');
    }

    public function login()
    {
        $this->view('auth/login');
    }

    public function store()
    {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        if (
            empty($username) ||
            empty($email) ||
            empty($password)
        ) {
            die("All fields are required.");
        }

        $user = new User();

        if ($user->findByEmail($email)) {
            die("Email already exists.");
        }

        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $user->create(
            $username,
            $email,
            $hashedPassword
        );

        echo "User Registered Successfully";
    }

    public function loginStore()
    {
        session_start();

        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $user = new User();

        $foundUser = $user->login($email);

        if (!$foundUser) {
            die("User not found.");
        }

        if (
            password_verify(
                $password,
                $foundUser['password']
            )
        ) {

            $_SESSION['user_id'] =
                $foundUser['id'];

            $_SESSION['username'] =
                $foundUser['username'];

            $_SESSION['role'] =
                $foundUser['role'];

            header("Location: index.php");
            exit;
        }

        die("Wrong password.");
    }

    public function logout()
    {
        session_start();

        session_unset();
        session_destroy();

        header("Location: login.php");
        exit;
    }
}
