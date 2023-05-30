<?php
require_once "./config/database.php";
require_once "models/Product.php";
require_once "views/ProductViews.php";
class ProductController
{
    private $productModel;
    public function __construct($conn)
    {
        $this->productModel = new Product($conn);
    }
    public function create()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $categoryname = $_POST['categoryname'];

        // Add product to the database
        $this->productModel->addProduct($name, $price, $categoryname);

    }


    public function delete($productId)
    {
        // Delete the product from the database
        $this->productModel->deleteProduct($productId);

    }

    public function update($productId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $categoryname = $_POST['categoryname'];

            // Update the product in the database
            $this->productModel->updateProduct($productId, $name, $price, $categoryname);
        } else {
            // Show the product update form
            // ...
        }
    }

    public function index()
    {
        // Retrieve all products from the database
        $products = $this->productModel->getAllProducts();

        // Display the products using the view
        $productView = new ProductView();
        $productView->showAllProducts($products);
    }

}

?>