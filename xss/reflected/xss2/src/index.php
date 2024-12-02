<?php
// Get user input from a query parameter
$image = $_GET['image'] ?? 'default.jpg';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Viewer</title>
</head>
<body>
    <h1>View Your Image</h1>
    <img src="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" alt="User Image">
</body>
</html>
