<?php

require_once '../app/Core/Database.php';

try {

    $db = Database::connect();

    echo "FitLife CMS Database Connected Successfully";

} catch (Exception $e) {

    echo $e->getMessage();
}