<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
</head>
<body>
    <h1>Welcome to the Phone Store</h1>
    <div>
        <h2>Phone 1</h2>
        <button onclick="fetchImage('award.png')">View Product Image</button>
    </div>
    <div>
        <h2>Phone 2</h2>
        <button onclick="fetchImage('carmarket.jpg')">View Product Image</button>
    </div>
    <div>
        <img id="product-image" src="" alt="Product image will appear here">
    </div>
    <script>
    function fetchImage(imageName) {
        const imageUrl = 'handle_file.php?image=' + encodeURIComponent(imageName);
        document.getElementById('product-image').src = imageUrl;
    }
</script>

</body>
</html>
