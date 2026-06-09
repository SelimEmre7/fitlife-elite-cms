<?php

require_once '../app/Core/Controller.php';
require_once '../app/Models/Post.php';
require_once '../app/Models/Comment.php';
require_once '../app/Models/Category.php';

class PostController extends Controller
{
    public function create()
    {
        $categoryModel = new Category();

        $categories = $categoryModel->getAll();

        $this->view('posts/create', [
            'categories' => $categories
        ]);
    }

    public function store()
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            die("Please login first.");
        }

        if (
            !isset($_POST['csrf_token']) ||
            !isset($_SESSION['csrf_token']) ||
            $_POST['csrf_token'] !== $_SESSION['csrf_token']
        ) {
            die("Invalid CSRF token.");
        }

        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');
        $categoryId = $_POST['category_id'] ?? null;

        if (
            empty($title) ||
            empty($content) ||
            empty($categoryId)
        ) {
            die("All fields are required.");
        }

        $post = new Post();

        $post->create(
            $title,
            $content,
            $categoryId,
            $_SESSION['user_id']
        );

        $_SESSION['success'] = "Post created successfully.";

        header("Location: index.php");
        exit;
    }

    public function show($id)
    {
        // ID doğrulaması
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$id) {
            header("Location: index.php");
            exit;
        }

        $postModel = new Post();
        $commentModel = new Comment();

        $post = $postModel->find($id);

        if (!$post) {
            header("Location: index.php");
            exit;
        }

        

        $comments = $commentModel->getByPost($id);

        $this->view('posts/show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function edit($id)
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            die("Access denied.");
        }

        $postModel = new Post();

        $post = $postModel->find($id);

        if (!$post || (
            $_SESSION['role'] !== 'admin' &&
            $_SESSION['user_id'] != $post['user_id']
        )) {
            die("Access denied.");
        }

        $this->view('posts/edit', [
            'post' => $post
        ]);
    }

    public function update()
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            die("Access denied.");
        }

        // CSRF Kontrolü
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("Invalid CSRF token.");
        }

        $id = $_POST['id'] ?? null;
        $postModel = new Post();
        $post = $postModel->find($id);

        if (!$post || (
            $_SESSION['role'] !== 'admin' &&
            $_SESSION['user_id'] != $post['user_id']
        )) {
            die("Access denied.");
        }

        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');

        if (empty($title) || empty($content)) {
            die("Title and content are required.");
        }

        $postModel->update(
            $id,
            $title,
            $content
        );

        header("Location: index.php");
        exit;
    }

    public function delete($id)
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            die("Access denied.");
        }

        $postModel = new Post();
        $post = $postModel->find($id);

        if (!$post || (
            $_SESSION['role'] !== 'admin' &&
            $_SESSION['user_id'] != $post['user_id']
        )) {
            die("Access denied.");
        }

        $postModel->delete($id);

        header("Location: index.php");
        exit;
    }

    public function search()
    {
        $keyword = trim($_GET['keyword'] ?? '');

        $post = new Post();

        $posts = $post->search($keyword);

        $this->view('home', [
            'posts' => $posts
        ]);
    }
}