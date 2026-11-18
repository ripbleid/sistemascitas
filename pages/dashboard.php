<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../login.php");
    exit();
}

$nombre = $_SESSION['nombre'] ?? 'Administrador';
?>

<!DOCTYPE html>
<html lang="es">


<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MediCitas | Dashboard</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/dashboards.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    l

</head>

<body>

<div class="dashboard-container">

    <!-- =========================
         SIDEBAR
    ========================== -->

    <?php include("../includes/sidebar.php"); ?>


    <!-- =========================
         CONTENIDO PRINCIPAL
    ========================== -->

    <main class="main">

        <!-- NAVBAR -->

        <?php include("../includes/navbar.php"); ?>


        <!-- =========================
             CONTENIDO
        ========================== -->

        <div class="contenido">


            <!-- =========================
                 BIENVENIDA
            ========================== -->

            <section class="bienvenida">

                <div class="bienvenida-texto">

                    <h1>
                        ¡Bienvenido,
                        <?php echo htmlspecialchars($nombre); ?>! 👋
                    </h1>

                    <p>
                        Aquí tienes un resumen general del sistema
                        de citas médicas.
                    </p>

                </div>


                <div class="fecha-dashboard">

                    <i class="fa-regular fa-calendar"></i>

                    <div>

                        <span>Hoy</span>

                        <strong id="fechaActual">
                            <?php echo date("d/m/Y"); ?>
                        </strong>

                    </div>

                </div>

            </section>



            <!-- =========================
                 TARJETAS PRINCIPALES
            ========================== -->

            <section class="estadisticas">


                <!-- PACIENTES -->

                <div class="stat-card pacientes">

                    <div class="stat-icon">

                        <i class="fa-solid fa-users"></i>

                    </div>

                    <div class="stat-info">

                        <span>Pacientes</span>

                        <h2>125</h2>

                        <small>
                            <i class="fa-solid fa-arrow-up"></i>
                            12% vs. mes anterior
                        </small>

                    </div>

                </div>



                <!-- MÉDICOS -->

                <div class="stat-card medicos">

                    <div class="stat-icon">

                        <i class="fa-solid fa-user-doctor"></i>

                    </div>

                    <div class="stat-info">

                        <span>Médicos</span>

                        <h2>18</h2>

                        <small>
                            <i class="fa-solid fa-arrow-up"></i>
                            5% vs. mes anterior
                        </small>

                    </div>

                </div>



                <!-- CITAS -->

                <div class="stat-card citas-hoy">

                    <div class="stat-icon">

                        <i class="fa-solid fa-calendar-check"></i>

                    </div>

                    <div class="stat-info">

                        <span>Citas hoy</span>

                        <h2>12</h2>

                        <small>
                            <i class="fa-solid fa-arrow-up"></i>
                            20% vs. ayer
                        </small>

                    </div>

                </div>



                <!-- MEDICAMENTOS -->

                <div class="stat-card medicamentos">

                    <div class="stat-icon">

                        <i class="fa-solid fa-pills"></i>

                    </div>

                    <div class="stat-info">

                        <span>Medicamentos</span>

                        <h2>48</h2>

                        <small>
                            <i class="fa-solid fa-arrow-up"></i>
                            8% vs. mes anterior
                        </small>

                    </div>

                </div>

            </section>



            <!-- =========================
                 CONTENIDO CENTRAL
            ========================== -->

            <section class="dashboard-grid">


                <!-- =========================
                     PRÓXIMAS CITAS
                ========================== -->

                <div class="panel proximas-citas">

                    <div class="panel-header">

                        <div>

                            <h2>
                                <i class="fa-regular fa-calendar-days"></i>
                                Próximas Citas
                            </h2>

                            <p>
                                Citas programadas para hoy
                            </p>

                        </div>

                        <a href="#">
                            Ver todas →
                        </a>

                    </div>



                    <!-- CITA 1 -->

                    <div class="cita">

                        <div class="info">

                            <div class="avatar avatar-blue">
                                M
                            </div>

                            <div class="datos-cita">

                                <h4>
                                    María López
                                </h4>

                                <span>
                                    Consulta General
                                </span>

                                <small>
                                    <i class="fa-regular fa-clock"></i>
                                    Hoy, 09:00 AM
                                </small>

                            </div>

                        </div>

                        <span class="estado confirmada">
                            Confirmada
                        </span>

                    </div>



                    <!-- CITA 2 -->

                    <div class="cita">

                        <div class="info">

                            <div class="avatar avatar-purple">
                                J
                            </div>

                            <div class="datos-cita">

                                <h4>
                                    Juan Pérez
                                </h4>

                                <span>
                                    Cardiología
                                </span>

                                <small>
                                    <i class="fa-regular fa-clock"></i>
                                    Hoy, 10:30 AM
                                </small>

                            </div>

                        </div>

                        <span class="estado confirmada">
                            Confirmada
                        </span>

                    </div>



                    <!-- CITA 3 -->

                    <div class="cita">

                        <div class="info">

                            <div class="avatar avatar-green">
                                A
                            </div>

                            <div class="datos-cita">

                                <h4>
                                    Ana Torres
                                </h4>

                                <span>
                                    Pediatría
                                </span>

                                <small>
                                    <i class="fa-regular fa-clock"></i>
                                    Hoy, 11:00 AM
                                </small>

                            </div>

                        </div>

                        <span class="estado pendiente">
                            Pendiente
                        </span>

                    </div>



                    <!-- CITA 4 -->

                    <div class="cita">

                        <div class="info">

                            <div class="avatar avatar-pink">
                                C
                            </div>

                            <div class="datos-cita">

                                <h4>
                                    Carlos Ramírez
                                </h4>

                                <span>
                                    Medicina Interna
                                </span>

                                <small>
                                    <i class="fa-regular fa-clock"></i>
                                    Hoy, 04:30 PM
                                </small>

                            </div>

                        </div>

                        <span class="estado confirmada">
                            Confirmada
                        </span>

                    </div>

                </div>



                <!-- =========================
                     GRÁFICA
                ========================== -->

                <div class="panel grafica-panel">

                    <div class="panel-header">

                        <div>

                            <h2>
                                <i class="fa-solid fa-chart-line"></i>
                                Citas por Mes
                            </h2>

                            <p>
                                Comportamiento de las citas
                            </p>

                        </div>

                        <select id="periodoGrafica">

                            <option value="mes">
                                Este mes
                            </option>

                            <option value="seis">
                                Últimos 6 meses
                            </option>

                            <option value="ano">
                                Este año
                            </option>

                        </select>

                    </div>


                    <div class="grafica">

                        <canvas id="graficaCitas"></canvas>

                    </div>

                </div>



                <!-- =========================
                     FRASE
                ========================== -->

                <div class="panel frase-medica">

                    <div class="frase-contenido">

                        <span class="comilla">
                            “
                        </span>

                        <p>
                            La salud no lo es todo,
                            pero sin ella todo lo demás
                            es nada.
                        </p>

                        <span class="marca-medicas">
                            <i class="fa-solid fa-heart-pulse"></i>
                            MediCitas
                        </span>

                    </div>

                </div>



                <!-- =========================
                     RESUMEN
                ========================== -->

                <div class="panel resumen-sistema">

                    <div class="resumen-icono">

                        <i class="fa-regular fa-lightbulb"></i>

                    </div>

                    <div class="resumen-texto">

                        <h2>
                            Resumen del sistema
                        </h2>

                        <p>
                            Gestiona tus pacientes, médicos,
                            citas y más de forma rápida y segura.
                        </p>

                    </div>

                    <a href="#" class="btn-reportes">

                        Ver reportes

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>



                <!-- =========================
                     PENDIENTES
                ========================== -->

                <div class="panel pendientes">

                    <div class="panel-header">

                        <h2>
                            <i class="fa-solid fa-hourglass-half"></i>
                            Pendientes
                        </h2>

                        <a href="#">
                            Ver todas →
                        </a>

                    </div>


                    <div class="pendientes-lista">


                        <div class="pendiente-item">

                            <span class="numero azul">
                                5
                            </span>

                            <span>
                                Citas por confirmar
                            </span>

                        </div>


                        <div class="pendiente-item">

                            <span class="numero naranja">
                                2
                            </span>

                            <span>
                                Pacientes nuevos
                            </span>

                        </div>


                        <div class="pendiente-item">

                            <span class="numero morado">
                                3
                            </span>

                            <span>
                                Medicamentos en stock bajo
                            </span>

                        </div>


                        <div class="pendiente-item">

                            <span class="numero rojo">
                                1
                            </span>

                            <span>
                                Tratamiento en seguimiento
                            </span>

                        </div>

                    </div>

                </div>

            </section>

        </div>

    </main>

</div>


<!-- JavaScript del Dashboard -->

<script src="../assets/js/dashboards.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const button = document.getElementById("menuButton");
    const container = document.querySelector(".dashboard-container");
    if (!button || !container) return;

    button.addEventListener("click", function () {
        const sidebar = document.getElementById("sidebarMenu");
        const isMobile = window.matchMedia("(max-width: 900px)").matches;
        let isOpen;
        if (isMobile && sidebar) {
            isOpen = sidebar.classList.toggle("open");
        } else {
            isOpen = !container.classList.toggle("sidebar-collapsed");
        }
        button.setAttribute("aria-expanded", String(isOpen));
    });
});
</script>

</body>

</html>
