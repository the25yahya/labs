<?php
header("Content-type: application/json");

if (isset($_GET['image'])) {
    $image = $_GET['image'];
    $pattern = '/\.\.\//';
    $new_image = preg_replace($pattern, '', $image);
    $base_dir = __DIR__ . '/images/';
    $file_path = $base_dir . $new_image;
    if (file_exists($file_path)) {
        $mime_type = mime_content_type($file_path);

        header("Content-type: $mime_type");
        header("Content-lentgh: " . filesize($file_path));
        header('Content-Disposition: inline; filename="' . basename($file_path) . '"');

        readfile($file_path);


    }else{
        http_response_code(404);
        echo "File not found.";
    }
}

?>