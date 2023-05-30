<?php
require_once './config/database.php';

class Product
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addProduct($name, $price, $categoryname)
    {
        // Create the INSERT query
        $query = "INSERT INTO products (name, price, categoryname) VALUES ('$name', $price, '$categoryname')";

        // Execute the query
        if ($this->conn->query($query) === TRUE) {
            echo "Product added successfully.";
        } else {
            echo "Error adding product: " . $this->conn->error;
        }
    }

    public function getAllProducts()
    {
        // Create the SELECT query
        $query = "SELECT * FROM products";

        // Execute the query
        $result = $this->conn->query($query);

        // Check if the query was successful
        if ($result) {
            $products = array();

            // Fetch the products from the result set
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }

            // Return the products array
            return $products;
        } else {
            echo "Error retrieving products: " . $this->conn->error;
            exit;
        }
    }

    public function deleteProduct($productId)
    {
        // Create the DELETE query
        $query = "DELETE FROM products WHERE _id = $productId";

        // Execute the query
        if ($this->conn->query($query) === TRUE) {
            echo "Product deleted successfully.";
        } else {
            echo "Error deleting product: " . $this->conn->error;
        }
    }

    public function updateProduct($productId, $name, $price, $categoryname)
    {
        // Create the UPDATE query
        $query = "UPDATE products SET name = '$name', price = $price, categoryname = '$categoryname' WHERE _id = $productId";

        // Execute the query
        if ($this->conn->query($query) === TRUE) {
            echo "Product updated successfully.";
        } else {
            echo "Error updating product: " . $this->conn->error;
        }
    }
}
?>