<?php
session_start();
require_once __DIR__ . '/includes/conexion.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ingresar'])) {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($usuario === '' || $password === '') {
        $error = 'Debes completar usuario y contraseña.';
    } else {
        $stmt = $conn->prepare('SELECT id, usuario, password FROM usuarios WHERE usuario = ? LIMIT 1');
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado && $resultado->num_rows === 1) {
            $datos = $resultado->fetch_assoc();
            $passwordValida = password_verify($password, $datos['password']) || $datos['password'] === $password;

            if ($passwordValida) {
                $_SESSION['id'] = $datos['id'];
                $_SESSION['nombre'] = $datos['usuario'];
                $_SESSION['usuario'] = $datos['usuario'];

                header('Location: pages/dashboard.php');
                exit();
            }
        }

        $error = 'Usuario o contraseña incorrectos.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCitas | Iniciar Sesión</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <div class="background">
        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
    </div>

    <div class="login-container">
        <div class="left">
            <div class="logo">
                <div class="circle">
                    <i class="fa-solid fa-heart-pulse"></i>
                </div>
                <h1>MediCitas</h1>
                <p>Gestiona pacientes, médicos y citas desde un solo lugar.</p>
            </div>
        </div>

        <div class="right">
            <div class="card">
                <h2>Bienvenido</h2>
                <p class="subtitle">Inicia sesión para continuar</p>

                <?php if ($error !== ''): ?>
                    <div class="alerta-error" style="margin-bottom: 15px; color: #d93025; font-size: 0.9rem;">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <form method="POST">
                    <div class="input-group">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="usuario" placeholder="Usuario" required>
                    </div>

                    <div class="input-group">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Contraseña" required>
                        <span class="toggle-password">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div>

                    <div class="options">
                        <label>
                            <input type="checkbox">
                            Recordarme
                        </label>
                        <a href="#">¿Olvidaste tu contraseña?</a>
                        <a href="registro.php" class="forgot-link">Registrarse</a>
                    </div>

                    <button type="submit" name="ingresar">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Ingresar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/login.js"></script>
</body>

</html>