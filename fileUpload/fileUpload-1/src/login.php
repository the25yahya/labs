<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Database connection
    $conn = new mysqli('db', 'root', 'root', 'fileUpload', 3306);
    if ($conn->connect_error) {
        http_response_code(500);
        echo "Database connection failed.";
        exit();
    }

    // Check if the user exists
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if ($password == $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;

            echo "success";
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
} else {
    http_response_code(405);
    echo "Method not allowed.";
}
?>
