<?php
$servername = "db";
$username = "root";
$password = "root";
$db_name = "fileUpload";

$conn = new mysqli($servername,$username,$password,$db_name);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}

?>