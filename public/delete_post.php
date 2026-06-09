<?php

require_once '../app/controllers/PostController.php';

$controller = new PostController();

$id = $_GET['id'] ?? 0;

$controller->delete($id);