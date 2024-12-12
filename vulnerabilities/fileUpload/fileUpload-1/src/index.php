<?php
session_start();
// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to user.php
    header("Location: user.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 35px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555555;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login to your account</h2>
        <form id="loginForm">
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your email" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Your password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div id="responseMessage" class="error"></div>
    </div>
    <script>
        document.getElementById("loginForm").addEventListener("submit", async (e) => {
            e.preventDefault();

            const formData = new FormData(e.target);

            try {
                const response = await fetch("login.php", {
                    method: "POST",
                    body: formData,
                });

                const result = await response.text();
                if (result.trim() === "success") {
                    window.location.href = "user.php";
                } else {
                    document.getElementById("responseMessage").textContent = result;
                }
            } catch (error) {
                document.getElementById("responseMessage").textContent = "An error occurred. Please try again.";
            }
        });
    </script>
</body>
</html>


