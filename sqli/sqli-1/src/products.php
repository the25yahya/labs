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

// Query to fetch products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    echo "<div class='products'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<img class='product-img' src='" . htmlspecialchars($row['imageLink']) . "' alt='Product Image'>";
        echo "<div>";
        echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
        echo "<p>Price: $" . htmlspecialchars($row['price']) . "</p>";
        echo "</div>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
        echo "<button>Add To Cart</button>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No products found.";
}

$conn->close();
?>
