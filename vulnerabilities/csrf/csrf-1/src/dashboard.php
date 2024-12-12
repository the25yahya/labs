<?php
session_start()

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        display:grid;
        place-items:center;
        padding-top:40px;
    }
</style>
<body>
    <h3><?php echo "Current email : " . $_SESSION['user_email']; ?></h3>
        <form action="changeEmail.php" method="POST" style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 300px;">
            <h2 style="margin-bottom: 20px; text-align: center; color: #333;">change your email</h2>
            <label for="email" style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter email" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
            <button type="submit" style="width: 100%; background-color: #007BFF; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
                submit
            </button>
        </form>
</body>
</html>