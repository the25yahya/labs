<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['user_email'])) {
        echo json_encode("user not logged in");
        exit;
    }
    $upload_dir = __DIR__ . '/uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);  // More secure than 0777
    }
    if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'message' => 'failed to upload file']);
        exit;
    }

    $file_path = $upload_dir . basename($_FILES['file']['name']);
    
    // Move the uploaded file to the server directory
    if (!move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
        echo json_encode(["success" => false, "message" => "failed to save file"]);
        exit;
    }
    
    // Ensure the file exists and is valid
    if (!file_exists($file_path) || empty($file_path)) {
        echo json_encode(["success" => false, "message" => "file does not exist or path is invalid"]);
        exit;
    }

    // Check if the file is an image
    $image_size = getimagesize($file_path);
    if ($image_size === false) {
        echo json_encode(["success" => false, "message" => "invalid image file"]);
        exit;
    }

    // Proceed with EXIF data if valid image
    $exif = exif_read_data($file_path);
    if ($exif) {
        echo '<pre>';
        print_r($exif);
        echo '</pre>';
    } else {
        echo "No EXIF data found in the image.";
    }

    $_SESSION['user_profile'] = 'uploads/' . basename($file_path);
    echo json_encode(["success" => true, "message" => "profile photo saved successfully"]);
    exit;
}


?>