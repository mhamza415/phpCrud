<?php
class ProductView
{

    public function showAllProducts($products)
    {
        if (empty($products)) {
            echo "No products found.";
        } else {
            echo "<h2>Products</h2>";
            echo "<ul>";
            foreach ($products as $product) {
                echo "<li>{$product['name']} - Price: {$product['price']} - Category: {$product['categoryname']}</li>";
            }
            echo "</ul>";
        }
    }

}

?>