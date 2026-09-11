<?php
session_start();
require_once __DIR__ . '/../includes/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['registrar'])) {
    header('Location: ../registro.php');
    exit();
}

$errores = [];
$usuario = trim($_POST['usuario'] ?? '');
$password = $_POST['password'] ?? '';

if ($usuario === '') {
    $errores[] = 'El usuario es obligatorio.';
} elseif (strlen($usuario) < 3) {
    $errores[] = 'El usuario debe tener al menos 3 caracteres.';
}

if ($password === '' || strlen($password) < 6) {
    $errores[] = 'La contraseña debe tener al menos 6 caracteres.';
}

if (empty($errores)) {
    $stmt = $conn->prepare('SELECT id FROM usuarios WHERE usuario = ? LIMIT 1');
    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $errores[] = 'Ese usuario ya está registrado.';
    } else {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $columnsResult = $conn->query("SHOW COLUMNS FROM usuarios LIKE 'created_at'");
        if ($columnsResult && $columnsResult->num_rows > 0) {
            $stmt = $conn->prepare('INSERT INTO usuarios (usuario, password, created_at) VALUES (?, ?, NOW())');
            $stmt->bind_param('ss', $usuario, $passwordHash);
        } else {
            $stmt = $conn->prepare('INSERT INTO usuarios (usuario, password) VALUES (?, ?)');
            $stmt->bind_param('ss', $usuario, $passwordHash);
        }

        if ($stmt->execute()) {
            $_SESSION['registro_exito'] = 'Registro exitoso. Redirigiendo al inicio de sesión...';
            header('Location: ../registro.php?registro_ok=1');
            exit();
        }

        $errores[] = 'No se pudo guardar el usuario. Inténtalo de nuevo.';
    }
}

$_SESSION['registro_errores'] = $errores;
header('Location: ../registro.php');
exit();
