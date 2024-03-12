<!-- Archivo: app/Views/auth/login.php -->

<?= $this->include('common/header'); ?>

<h2>Iniciar Sesión</h2>

<!-- Formulario de Inicio de Sesión -->
<form action="<?= site_url('iniciar_sesion') ?>" method="post">
    <!-- Agrega tus campos de formulario aquí (usuario y contraseña) -->
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <button type="submit">Iniciar Sesión</button>
</form>

<?= $this->include('common/footer'); ?>
