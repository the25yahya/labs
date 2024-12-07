<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $file_path = __DIR__ . "/images/" . $file;

    if (file_exists($file_path)) {
        header("Content-Type: " . mime_content_type($file_path));
        readfile($file_path);
        exit;
    }else{
        echo "file not found";
    }
}else{
    echo "No file was specified!";
}

?>