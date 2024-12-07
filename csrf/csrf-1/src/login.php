<?php
    include('db.php');
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['email'] && $_POST['password'] !== NULL) {
            $user_email = $_POST['email'];
            $user_password = $_POST['password'];
        }else{
            http_response_code(400);
            echo json_encode(['status' => 'error','message'=>'invalid request']);
        }

        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ss", $user_email, $user_password); // Bind username and password as strings
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows === 1) {

                $user = $result->fetch_assoc();
                 // Store user data in session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                header("Location: /");
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Invalid username or password.']);
            }
        
            $stmt->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $conn->error]);
        }
    }
        // Close connection
        $conn->close();
        ?>