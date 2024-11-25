<?php
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['email'])) {
        echo json_encode(['success' => false, 'message' => 'User not logged in.']);
        exit;
    }

    // Define the uploads directory
    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Check if file is uploaded
    if (!isset($_FILES['profilePhoto']) || $_FILES['profilePhoto']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'message' => 'Failed to upload file.']);
        exit;
    }

    // Validate file type (only allow images)
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $fileType = mime_content_type($_FILES['profilePhoto']['tmp_name']);
    if (!in_array($fileType, $allowedTypes)) {
        echo json_encode(['success' => false, 'message' => 'Invalid file type. Only images are allowed.']);
        exit;
    }

    // Generate a unique file name
    $fileName = uniqid('profile_', true) . '.' . pathinfo($_FILES['profilePhoto']['name'], PATHINFO_EXTENSION);

    // Save the file
    $filePath = $uploadDir . $fileName;
    if (!move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $filePath)) {
        echo json_encode(['success' => false, 'message' => 'Failed to save file.']);
        exit;
    }

    // Update the session with the user's profile photo path
    $_SESSION['profilePhoto'] = 'uploads/' . $fileName;

    // Return success response
    echo json_encode(['success' => true, 'filePath' => $_SESSION['profilePhoto']]);
    exit;
}

echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
