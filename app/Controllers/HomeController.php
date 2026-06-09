<?php

require_once '../app/Core/Controller.php';
require_once '../app/Models/Post.php';

class HomeController extends Controller
{
    public function index()
    {
        $post = new Post();

        if (
            isset($_GET['keyword']) &&
            !empty($_GET['keyword'])
        )
        {
            $posts = $post->search(
                trim($_GET['keyword'])
            );

            $this->view('home', [
                'posts' => $posts
            ]);

            return;
        }

        $page = $_GET['page'] ?? 1;

        $limit = 10;

        $offset =
            ($page - 1) * $limit;

        $posts =
            $post->getPaginated(
                $offset,
                $limit
            );

        $totalPosts =
            $post->countAll();

        $totalPages =
            ceil(
                $totalPosts / $limit
            );

        $this->view('home', [
            'posts' => $posts,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
    }
}