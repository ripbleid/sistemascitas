<?php

$host = "localhost";
$user = "root";
$password = "";
$bd = "MediCitas";

$conn = new mysqli($host, $user, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

?>

?>