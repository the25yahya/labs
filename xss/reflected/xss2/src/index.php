<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>xss2</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>please provide an image link to display</h1>
        <div class="image-container">
            <div>
                <input id="input" type="text" placeholder="please input an image src">
                <button class="btn">search</button>
            </div>
        </div>
    </div>

    <script src="js/index.js"></script>
</body>
</html>