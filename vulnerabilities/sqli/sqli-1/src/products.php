<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "sqlinj";

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$typeFilter = isset($_GET['type']) ? $_GET['type'] : '';

if ($typeFilter) {
    $sql = "SELECT * FROM products WHERE type = '$typeFilter'";
} else{
    $sql = "SELECT * FROM products";
}

$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    echo "<div class='filters' id='filters'>"; // Add an ID for easier targeting in JavaScript
    echo "<p data-type='Electronics'>Electronics</p>";
    echo "<p data-type='Stationery'>Stationery</p>";
    echo "<p data-type='Kitchenware'>Kitchenware</p>";
    echo "<p data-type='Furniture'>Furniture</p>";
    echo "</div>";    
    echo "<div class='products'>";
    while ($row = $result->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<img class='product-img' src='" . htmlspecialchars($row['imageLink']) . "' alt='Product Image'>";
            echo "<div class='name-price'>";
                echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
                echo "<p>Price: $" . htmlspecialchars($row['price']) . "</p>";
            echo "</div>";
            echo "<p class='description'>" . htmlspecialchars($row['description']) . "</p>";
            echo "<button>Add To Cart</button>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No products found.";
}

$conn->close();
?>
