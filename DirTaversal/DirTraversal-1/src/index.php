<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Store</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js" defer></script>
</head>
<body>
    <h1>Welcome to the Phone Store</h1>
    <div class="products">
        <div class="product">
            <h2>Phone 1</h2>
            <button onclick="fetchImage('iphone-14.jpeg')">View Image</button>
        </div>
        <div class="product">
            <h2>Phone 2</h2>
            <button onclick="fetchImage('iphone-15.jpeg')">View Image</button>
        </div>
    </div>
    <div id="image-container">
        <h3>Image:</h3>
        <img id="product-image" src="" alt="Product Image">
    </div>

    <script>
        function fetchImage(filename) {
            const imgElement = document.getElementById('product-image');
            imgElement.src = `fetch-image.php?file=${filename}`;
        }
    </script>
</body>
</html>
