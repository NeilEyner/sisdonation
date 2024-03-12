<nav>
    <ul>
        <li><a href="<?= site_url('/') ?>">Inicio</a></li>
        <li><a href="<?= site_url('productos/listar') ?>">Productos</a></li>
        <li><a href="<?= site_url('alimentos/listar') ?>">Alimentos</a></li>
        <li><a href="<?= site_url('contacto') ?>">Contacto</a></li>
        <li><a href="<?= site_url('faq') ?>">Preguntas Frecuentes</a></li>

        <!-- Mostrar opciones según el tipo de usuario -->
        <?php if (!session()->get('tipo_usuario')) : ?>
            <li><a href="<?= site_url('login') ?>">Iniciar Sesión</a></li>
        <?php elseif (session()->get('tipo_usuario') == 'ADMINISTRADOR') : ?>
            <li><a href="<?= site_url('administrador/dashboard') ?>">Dashboard</a></li>
            <li><a href="<?= site_url('administrador/usuarios') ?>">Usuarios</a></li>
            <li><a href="<?= site_url('administrador/productos_vista') ?>">productos</a></li>
            <p>Hola, <?= session()->get('nombre_usuario') ?> | <a href="<?= site_url('cerrar_sesion') ?>">Cerrar Sesión</a></p>
            
        <?php elseif (session()->get('tipo_usuario') == 'VOLUNTARIO') : ?>
            <!-- Opciones para el usuario cliente -->
            <p>Hola, <?= session()->get('nombre_usuario') ?> | <a href="<?= site_url('cerrar_sesion') ?>">Cerrar Sesión</a></p>
        <?php elseif (session()->get('tipo_usuario') == 'ORGANIZACION') : ?>
            <!-- Opciones para otro tipo de usuario -->
            <p>Hola, <?= session()->get('nombre_usuario') ?> | <a href="<?= site_url('cerrar_sesion') ?>">Cerrar Sesión</a></p>
        <?php endif; ?>

    </ul>
</nav>