<?php
session_start();
require_once '../configs/env.php';

if (isset($_GET['page']) && $_GET['page'] == 'products') {
    require_once '../controllers/ProductController.php';
    $controller = new ProductController($db);
    $controller->index();
} else {
    require_once '../controllers/HomeController.php';
    $controller = new HomeController();
    $controller->index();
}
?>