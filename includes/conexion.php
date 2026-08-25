<?php 
$host = "localhost";
$user = "root";
$password = "";
$bd ="medicitas";

$conn = new mysqli($host, $user, $password, $bd);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>