<?php

require_once '../app/Core/Controller.php';
require_once '../app/Models/Comment.php';

class CommentController extends Controller
{
    public function store()
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            die("Please login first.");
        }

        $postId = $_POST['post_id'];
        $content = trim($_POST['content']);

        if (empty($content)) {
            die("Comment cannot be empty.");
        }

        $comment = new Comment();

        $comment->create(
            $postId,
            $_SESSION['user_id'],
            $content
        );

        header("Location: post.php?id=" . $postId);
        exit;
    }
}