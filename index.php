<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once './controllers/HomeController.php';
require_once './controllers/ProductController.php';
require_once './config/database.php';

// Define routes
$route = $_SERVER['REQUEST_URI'];

// Handle routes
switch ($route) {
    case '/new/index.php/':
        $homeController = new HomeController();
        $homeController->index();
        break;

    // path to create product
// http://localhost/new/index.php/createproducts

    case '/new/index.php/createproducts':
        $productController = new ProductController($conn);
        $productController->create();
        break;



    case '/new/index.php/deleteproduct':
        // var_dump($_GET['id']);
        if (isset($_POST['id'])) {
            $productId = $_POST['id'];
            $productController = new ProductController($conn);
            $productController->delete($productId);
        } else {
            echo "Invalid product ID";
        }
        break;

    case '/new/index.php/updateproduct':
        if (isset($_POST['id'])) {
            $productId = $_POST['id'];
            $productController = new ProductController($conn);
            $productController->update($productId);
        } else {
            echo "Invalid product ID";
        }
        break;

    case '/new/index.php/allproducts':
        $productController = new ProductController($conn);
        $productController->index();
        break;


    default:
        echo "404 Not Found";
        break;
}
?>