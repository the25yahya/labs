<?php
// Start session at the beginning
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Declare creds
    $email = $_POST['email'];
    $password = $_POST['password'];

    # Prepare query
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);

    # Execute query
    $stmt->execute();

    # Get results
    $results = $stmt->get_result();

    if ($results->num_rows === 1) {
        $user = $results->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        
        // Redirect to home page
        header("Location: /");
        exit; // Always call exit after header redirection to stop further script execution
    } else {
        echo json_encode("Invalid email or password");
    }

    $stmt->close();
}

$conn->close();
?>
