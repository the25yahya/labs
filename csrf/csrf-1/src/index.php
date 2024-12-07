<?php
include('db.php');
$sql = "SELECT * FROM products";

$results = $conn->query($sql);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
</head>
<style>
    nav{
        display:flex;
        align-items:center;
        justify-content:center;
    }
    nav a{
        color:black;
        margin:10px;
    }
    .product-img{
    width: 200px;
    border: 1px solid black;
    box-shadow: darkgrey;
    border-radius: 10px;
    }
    .products{
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 10px;
        flex-wrap: wrap;
        margin-top:50px;
    }
    .name-price{
        display: flex;
        justify-content: space-around;
        align-items: center;
        font: bold;
        margin-top: 4px;
        margin-bottom: 4px;
    }
    .name-price h2{
        font-size: 16px;
    }
    .description{
        width: 200px;
    }
</style>
<body>
    <div>
        <nav>
            <div>
                <a href="/">Home</a>
                <?php
                // Check if the user is logged in
                if (isset($_SESSION['user_email'])) {
                    echo '<a href="dashboard.php">Account</a>';
                } else {
                    echo '<a href="Myaccount.php">Login</a>';
                }
                ?>
            </div>
        </nav>
        <div>
            <?php
            if ($results -> num_rows > 0) {
                echo "<div class='products'>";
                while ($row = $results->fetch_assoc()) {
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
            }
                        
            ?>
        </div>
    </div>
</body>
</html>