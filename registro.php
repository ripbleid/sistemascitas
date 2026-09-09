<?php
// registro.php - Vista de registro utilizando los estilos idénticos del login
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCitas - Registro</title>
    <!-- Vinculamos exactamente tu mismo archivo CSS -->
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- FontAwesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <!-- Fondo con ondas idéntico al login -->
    <div class="background"></div>

    <div class="login-container">
        
        <!-- PANEL IZQUIERDO: Mismo diseño del logo y colores -->
        <div class="left">
            <div class="logo">
                <div class="circle">
                    <i class="fa-solid fa-heart-pulse"></i>
                </div>
                <h1>MediCitas</h1>
                <p>Gestiona pacientes, médicos y citas desde un solo lugar.</p>
            </div>
        </div>

        <!-- PANEL DERECHO: Formulario de Registro -->
        <div class="right">
            <div class="card">
                <h2>Crear Cuenta</h2>
                <p class="subtitle">Regístrate para comenzar a usar el sistema</p>

                <!-- Formulario que envía los datos a tu script de registro en PHP -->
                <form action="../database/procesar_registro.php" method="POST">
                    
                    <!-- Campo Nombre Completo / Usuario -->
                    <div class="input-group">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="nombre" placeholder="Nombre completo" required>
                    </div>

                    <!-- Campo Correo Electrónico -->
                    <div class="input-group">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="correo" placeholder="Correo electrónico" required>
                    </div>

                    <!-- Campo Contraseña -->
                    <div class="input-group">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="contrasena" placeholder="Contraseña" required id="password">
                        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
                    </div>

                    <!-- Opciones: En vez de "Olvidaste tu contraseña", ponemos el enlace para iniciar sesión -->
                    <div class="options" style="justify-content: flex-end;">
                        <a href="login.php">¿Ya tienes una cuenta? Inicia sesión</a>
                    </div>

                    <!-- Botón de Registro -->
                    <button type="submit">
                        <i class="fa-solid fa-user-plus"></i> Registrarse
                    </button>
                </form>
            </div>
        </div>

    </div>

</body>
</html>