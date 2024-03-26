<!DOCTYPE html>
<html lang="es">

<head>
    <?= $this->include('common/header'); ?>
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Agregar Persona</h1>
        <form method="post" action="<?php echo base_url() . 'administrador/agregar-persona'  ?>" class="row g-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="ci" class="form-label">CI:</label>
                <input type="text" name="ci" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" name="correo" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" name="telefono" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" name="direccion" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="tipo_persona" class="form-label">Tipo de Persona:</label>
                <select name="tipo_persona" class="form-select" required>
                    <option value="CASUAL">Usuario</option>
                    <option value="VOLUNTARIO">Voluntario</option>
                    <option value="ADMINISTRADOR">Administrador</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text" name="usuario" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="contrasena" class="form-label">Contraseña:</label>
                <input type="password" name="contrasena" class="form-control" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Agregar Persona</button>
            </div>
        </form>
    </div>
    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>

</body>

</html>
