<?php
$host = 'localhost';
$user = 'root';
$password = '';
$bd = 'medicitas';

$conn = new mysqli($host, $user, $password);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $bd CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
$conn->select_db($bd);

$conn->query(
    "CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        usuario VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )"
);

$columns = [];
$result = $conn->query('SHOW COLUMNS FROM usuarios');
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $columns[] = $row['Field'];
    }
}

if (in_array('email', $columns, true)) {
    $conn->query('ALTER TABLE usuarios DROP COLUMN email');
}

if (in_array('nombre', $columns, true)) {
    $conn->query('ALTER TABLE usuarios DROP COLUMN nombre');
}

if (!in_array('usuario', $columns, true)) {
    $conn->query('ALTER TABLE usuarios ADD COLUMN usuario VARCHAR(50) NOT NULL UNIQUE AFTER id');
}

if (!in_array('password', $columns, true)) {
    $conn->query('ALTER TABLE usuarios ADD COLUMN password VARCHAR(255) NOT NULL AFTER usuario');
}

if (!in_array('created_at', $columns, true)) {
    $conn->query('ALTER TABLE usuarios ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP AFTER password');
}

$conn->set_charset('utf8mb4');
?>