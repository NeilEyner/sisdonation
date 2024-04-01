<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
    <div class="container">
        <a class="navbar-brand me-2" href="<?= site_url('/') ?>">
            <img src="<?= base_url('assets/images/logo/logobcolor.png') ?>" alt="Nuevo Logo" class="logo-img img-fluid" style="max-height: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/') ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#quienes-somos">Quiénes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#donaciones">Donaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacto">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#preguntas-frecuentes">Preguntas Frecuentes</a>
                </li>

                <?php if (!session()->get('tipo_usuario')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('login') ?>">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('login') ?>">Registrarse</a>
                    </li>
                <?php elseif (session()->get('tipo_usuario') == 'ADMINISTRADOR') : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            HOLA, <?= session()->get('nombre_usuario') ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= site_url('administrador/dashboard') ?>">Dashboard</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('administrador/usuarios') ?>">Usuarios</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('administrador/mostrarProductos') ?>">Productos</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('administrador/mostrarAlimentos') ?>">Alimentos</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('administrador/donaciones_pendientes') ?>">Donaciones Pendientes</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= site_url('cerrar_sesion') ?>">Cerrar Sesión</a></li>
                        </ul>
                    </li>

                <?php elseif (session()->get('tipo_usuario') == 'ORGANIZACION_BENEFICA') : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            HOLA, <?= session()->get('nombre_usuario') ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= site_url('organizacion_benefica/dashboard') ?>">Dashboard</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('organizacion_benefica/gestion_productos') ?>">Gestión de Productos Donados</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('organizacion_benefica/gestion_alimentos') ?>">Gestión de Alimentos Donados</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('organizacion_benefica/seguimiento_donaciones') ?>">Seguimiento de Donaciones</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('organizacion_benefica/donaciones_pendientes') ?>">Panel de Donaciones Pendientes</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('organizacion_benefica/perfil') ?>">Perfil de la Organización</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= site_url('cerrar_sesion') ?>">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                <?php elseif (session()->get('tipo_usuario') == 'ORGANIZACION_RECEPTORA') : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            HOLA, <?= session()->get('nombre_usuario') ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= site_url('organizacion_receptora/solicitud_donaciones') ?>">Solicitud de Donaciones</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('organizacion_receptora/registro_donaciones') ?>">Registro de Donaciones Recibidas</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('organizacion_receptora/perfil') ?>">Perfil de la Organización</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= site_url('cerrar_sesion') ?>">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                <?php elseif (session()->get('tipo_usuario') == 'VOLUNTARIO') : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            HOLA, <?= session()->get('nombre_usuario') ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= site_url('voluntario/dashboard') ?>">Dashboard</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('voluntario/registro_actividades') ?>">Registro de Actividades</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('voluntario/busqueda_oportunidades') ?>">Búsqueda de Oportunidades de Voluntariado</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('voluntario/perfil') ?>">Perfil de Voluntario</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= site_url('cerrar_sesion') ?>">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>