/* =========================================================
   MEDICITAS - DASHBOARD JAVASCRIPT
   ========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    /* =====================================================
       FECHA ACTUAL
    ===================================================== */

    const fechaActual = document.getElementById("fechaActual");

    if (fechaActual) {

        const fecha = new Date();

        const dia = String(fecha.getDate()).padStart(2, "0");
        const mes = String(fecha.getMonth() + 1).padStart(2, "0");
        const año = fecha.getFullYear();

        fechaActual.textContent = `${dia}/${mes}/${año}`;
    }


    /* =====================================================
       GRÁFICA DE CITAS
    ===================================================== */

    const canvas = document.getElementById("graficaCitas");

    if (!canvas) {
        return;
    }

    const ctx = canvas.getContext("2d");


    /* =====================================================
       DATOS DE LAS GRÁFICAS
    ===================================================== */

    const datos = {

        mes: {
            labels: [
                "Lun",
                "Mar",
                "Mié",
                "Jue",
                "Vie",
                "Sáb",
                "Dom"
            ],

            valores: [
                8,
                12,
                10,
                15,
                13,
                7,
                5
            ]
        },


        seis: {
            labels: [
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre"
            ],

            valores: [
                72,
                85,
                91,
                105,
                118,
                125
            ]
        },


        ano: {
            labels: [
                "Ene",
                "Feb",
                "Mar",
                "Abr",
                "May",
                "Jun",
                "Jul",
                "Ago",
                "Sep",
                "Oct",
                "Nov",
                "Dic"
            ],

            valores: [
                65,
                78,
                82,
                90,
                72,
                95,
                103,
                98,
                112,
                125,
                118,
                130
            ]
        }

    };


    /* =====================================================
       CONFIGURACIÓN DE LA GRÁFICA
    ===================================================== */

    let grafica = new Chart(ctx, {

        type: "line",

        data: {

            labels: datos.mes.labels,

            datasets: [

                {
                    label: "Citas",

                    data: datos.mes.valores,

                    borderColor: "#2563eb",

                    backgroundColor: "rgba(37, 99, 235, 0.10)",

                    borderWidth: 3,

                    pointBackgroundColor: "#2563eb",

                    pointBorderColor: "#ffffff",

                    pointBorderWidth: 2,

                    pointRadius: 4,

                    pointHoverRadius: 6,

                    fill: true,

                    tension: 0.4
                }

            ]
        },


        options: {

            responsive: true,

            maintainAspectRatio: false,

            interaction: {
                intersect: false,
                mode: "index"
            },

            plugins: {

                legend: {
                    display: false
                },

                tooltip: {

                    backgroundColor: "#1e293b",

                    titleColor: "#ffffff",

                    bodyColor: "#ffffff",

                    padding: 12,

                    cornerRadius: 8,

                    displayColors: false,

                    callbacks: {

                        label: function (context) {

                            return " " + context.parsed.y + " citas";

                        }

                    }
                }

            },


            scales: {

                x: {

                    grid: {
                        display: false
                    },

                    ticks: {
                        color: "#94a3b8",
                        font: {
                            size: 11
                        }
                    }

                },


                y: {

                    beginAtZero: true,

                    grid: {
                        color: "#eef2f7"
                    },

                    ticks: {
                        color: "#94a3b8",
                        font: {
                            size: 11
                        },

                        stepSize: 20
                    }

                }

            }

        }

    });


    /* =====================================================
       CAMBIAR PERÍODO DE LA GRÁFICA
    ===================================================== */

    const selector = document.getElementById("periodoGrafica");

    if (selector) {

        selector.addEventListener("change", function () {

            const periodo = this.value;

            if (!datos[periodo]) {
                return;
            }

            grafica.data.labels = datos[periodo].labels;

            grafica.data.datasets[0].data = datos[periodo].valores;

            grafica.update();

        });

    }


    /* =====================================================
       EFECTO HOVER EN LAS TARJETAS
    ===================================================== */

    const tarjetas = document.querySelectorAll(".stat-card");

    tarjetas.forEach(function (tarjeta) {

        tarjeta.addEventListener("mouseenter", function () {

            this.style.cursor = "default";

        });

    });


    /* =====================================================
       ANIMACIÓN DE ENTRADA
    ===================================================== */

    const elementos = document.querySelectorAll(
        ".stat-card, .panel"
    );

    elementos.forEach(function (elemento, index) {

        elemento.style.animationDelay = `${index * 0.05}s`;

    });

});