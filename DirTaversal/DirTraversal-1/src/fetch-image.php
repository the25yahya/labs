<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $filePath = __DIR__ . "/images/" . $file;

    if (file_exists($filePath)) {
        header("Content-Type: " . mime_content_type($filePath));
        readfile($filePath);
        exit;
    } else {
        echo "File not found!";
    }
} else {
    echo "No file specified!";
}
?>