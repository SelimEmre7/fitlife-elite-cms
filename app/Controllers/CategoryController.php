<?php

require_once '../app/Core/Controller.php';
require_once '../app/Models/Category.php';

class CategoryController extends Controller
{
    public function index()
    {
        $category = new Category();

        $categories = $category->getAll();

        $this->view('categories/index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $this->view('categories/create');
    }

    public function store()
    {
        $name = trim($_POST['name'] ?? '');

        if (empty($name))
        {
            die("Category name required.");
        }

        $category = new Category();

        try
        {
            $category->create($name);

            header("Location: categories.php");
            exit;
        }
        catch (PDOException $e)
        {
            die("This category already exists.");
        }
    }
}