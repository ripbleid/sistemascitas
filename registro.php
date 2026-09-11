<?php
session_start();
$errores = $_SESSION['registro_errores'] ?? [];
$exito = $_SESSION['registro_exito'] ?? '';
$registroOk = isset($_GET['registro_ok']) && $_GET['registro_ok'] == 1;
unset($_SESSION['registro_errores'], $_SESSION['registro_exito']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCitas - Registro</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .alerta-exito {
            background: #e8f5e9;
            border: 1px solid #4caf50;
            color: #1b5e20;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 15px;
            font-size: 0.95rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .alerta-exito i {
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <div class="background"></div>

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
                <h2>Crear Cuenta</h2>
                <p class="subtitle">Regístrate para comenzar a usar el sistema</p>

                <?php if (!empty($errores)): ?>
                    <div class="alerta-error" style="margin-bottom: 15px; color: #d93025; font-size: 0.9rem;">
                        <?php foreach ($errores as $error): ?>
                            <div><?php echo htmlspecialchars($error); ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($registroOk || $exito !== ''): ?>
                    <div class="alerta-exito">
                        <i class="fa-solid fa-circle-check"></i>
                        <span><?php echo htmlspecialchars($exito !== '' ? $exito : 'Registro exitoso. Redirigiendo al inicio de sesión...'); ?></span>
                    </div>
                <?php endif; ?>

                <form action="database/procesar_registro.php" method="POST">
                    <div class="input-group">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="usuario" placeholder="Usuario" required>
                    </div>

                    <div class="input-group">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Contraseña" required>
                    </div>

                    <div class="options" style="justify-content: flex-end;">
                        <a href="login.php">¿Ya tienes una cuenta? Inicia sesión</a>
                    </div>

                    <button type="submit" name="registrar">
                        <i class="fa-solid fa-user-plus"></i> Registrarse
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        <?php if ($registroOk): ?>
            setTimeout(function () {
                window.location.href = 'login.php';
            }, 3000);
        <?php endif; ?>
    </script>
</body>
</html>