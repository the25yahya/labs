<?php
    session_start();
    include('db.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['email']) {
            $new_email = $_POST['email'];
            $sql = "UPDATE users SET email = ? WHERE email = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("ss",$new_email,$_SESSION['user_email']);
                $stmt->execute();
                if ($stmt->affected_rows > 0) {
                    // Update the session email to the new email
                    $_SESSION['user_email'] = $new_email;
                    header("Location: /dashboard.php");
                } else {
                    echo "No changes were made. The email might be the same or something went wrong.";
                }
        
                $stmt->close();
            } else {
                echo "Error executing query: " . $conn->error;
            }
        
            // Close connection
            $conn->close();
            
        }
    }

    
?>