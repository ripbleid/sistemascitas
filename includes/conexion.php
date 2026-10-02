<?php

$host = 'sql209.infinityfree.com';
$user = 'if0_43071915';
$password = 'Car20075los';
$bd = 'if0_43071915_MediCitas';

$conn = new mysqli($host, $user, $password, $bd);

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

$conn->set_charset('utf8mb4');

?>