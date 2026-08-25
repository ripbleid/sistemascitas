<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<link rel="stylesheet" href="../assets/css/dashboards.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<?php include("../includes/sidebar.php"); ?>

<div class="main">

<?php include("../includes/navbar.php"); ?>

<div class="contenido">

<h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>

<p>Resumen general del sistema</p>

<div class="cards">

<div class="paneles">

    <div class="panel">

        <h2>Próximas Citas</h2>

        <div class="cita">

            <div class="info">

                <div class="avatar">M</div>

                <div>

                    <h4>María López</h4>

                    <span>Consulta General</span>

                </div>

            </div>

            <span class="hora">09:00 AM</span>

        </div>

        <div class="cita">

            <div class="info">

                <div class="avatar">J</div>

                <div>

                    <h4>Juan Pérez</h4>

                    <span>Cardiología</span>

                </div>

            </div>

            <span class="hora">10:30 AM</span>

        </div>

        <div class="cita">

            <div class="info">

                <div class="avatar">A</div>

                <div>

                    <h4>Ana Torres</h4>

                    <span>Pediatría</span>

                </div>

            </div>

            <span class="hora">11:00 AM</span>

        </div>

    </div>

    <div class="panel">

        <h2>Citas por Mes</h2>

        <div class="grafica">

            <canvas id="graficaCitas"></canvas>

        </div>

    </div>

</div>

<div class="card">

<h3>👥 Pacientes</h3>

<h2>125</h2>

</div>

<div class="card">

<h3>👨‍⚕️ Médicos</h3>

<h2>18</h2>

</div>

<div class="card">

<h3>📅 Citas Hoy</h3>

<h2>12</h2>

</div>

<div class="card">

<h3>⏳ Pendientes</h3>

<h2>5</h2>

</div>

</div>

</div>

</div>

<script src="../assets/js/dashboard.js"></script>

</body>

</html>