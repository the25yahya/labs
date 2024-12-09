<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['user_email'])) {
        echo json_encode("user not logged in");
        exit;
    }
    $upload_dir = __DIR__ . '/uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir,0777,true);
    }
    if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success'=>false,'message'=>'failed to upload file']);
        exit;
    }
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $file_type = mime_content_type($_FILES['file']['tmp_name']);
    $file_extension = strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));

    if (!in_array($file_extension,['jpg', 'jpeg', 'png', 'gif'])) {
        echo json_encode(['success' => false, 'message' => 'file type not allowed']);
        exit;
    }
    if (!in_array($file_type,$allowed_types)) {
        echo json_encode(['success' => false, 'message' => 'file type not allowed']);
        exit;
    }
    $file_name = uniqid('profile_',true) . '.' . pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);

    $file_path = $upload_dir . $file_name;
    if (!move_uploaded_file($_FILES['file']['tmp_name'],$file_path)) {
        echo json_encode(["success" => false, "message" => "failed to save file"]);
        exit;
    }
    $_SESSION['user_profile'] = 'uploads/' . $file_name;
    echo json_encode(["success" => true,"message" => "profile photo saved successfully : uploads/" . $file_name ]);
    exit;
}

echo json_encode(['success' => false, 'message' => 'Invalid request method.']);

?>