<!-- Archivo: app/Views/auth/login.php -->

<?= $this->include('common/header'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Iniciar Sesión</h2>
                    <!-- Formulario de Inicio de Sesión -->
                    <form action="<?= site_url('iniciar_sesion') ?>" method="post">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control border-start-0" id="usuario" name="usuario" placeholder="Usuario" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-lock"></i></span>
                                <input type="password" class="form-control border-start-0" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('common/footer'); ?>
