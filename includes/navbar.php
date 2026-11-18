<div class="navbar">

    <!-- PARTE IZQUIERDA -->

    <div class="navbar-left">

        <button class="menu-button" id="menuButton" type="button"
                aria-label="Abrir o cerrar menú" aria-controls="sidebarMenu" aria-expanded="true">

            <i class="fa-solid fa-bars"></i>

        </button>


        <div class="page-title">

            <span>Panel principal</span>

            <small>
                Gestión y administración
            </small>

        </div>

    </div>


    <!-- PARTE DERECHA -->

    <div class="navbar-right">


        <!-- BUSCADOR -->

        <div class="navbar-search">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input
                type="text"
                placeholder="Buscar..."
                id="buscadorDashboard"
            >

        </div>


        <!-- NOTIFICACIONES -->

        <button class="notification-button">

            <i class="fa-regular fa-bell"></i>

            <span class="notification-number">
                3
            </span>

        </button>


        <!-- SEPARADOR -->

        <div class="navbar-divider"></div>


        <!-- USUARIO -->

        <div class="navbar-user">

            <div class="user-avatar">

                <i class="fa-solid fa-user"></i>

            </div>


            <div class="user-data">

                <strong>
                    <?php echo htmlspecialchars($_SESSION['nombre'] ?? 'Admin'); ?>
                </strong>

                <small>
                    Administrador
                </small>

            </div>


            <i class="fa-solid fa-chevron-down user-arrow"></i>

        </div>

    </div>

</div>
