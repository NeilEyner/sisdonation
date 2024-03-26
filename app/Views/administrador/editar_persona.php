<!DOCTYPE html>
<html lang="es">

<head>
    <?= $this->include('common/header'); ?>
</head>

<body>

    <div class="container mt-5">
        <h1 class="mb-4">Editar Persona</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="<?= site_url('administrador/guardar_edicion_persona/' . $persona->id_persona) ?>" method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $persona->nombre; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $persona->apellido; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ci" class="form-label">CI:</label>
                        <input type="text" class="form-control" id="ci" name="ci" value="<?= $persona->ci; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo:</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="<?= $persona->correo; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $persona->telefono; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $persona->direccion; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= $persona->fecha_nacimiento; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_persona" class="form-label">Tipo de Persona:</label>
                        <select class="form-select" id="tipo_persona" name="tipo_persona" required>
                            <option value="ORGANIZACION" <?= ($persona->tipo_persona === 'ORGANIZACION') ? 'selected' : ''; ?>>Organización</option>
                            <option value="VOLUNTARIO" <?= ($persona->tipo_persona === 'VOLUNTARIO') ? 'selected' : ''; ?>>Voluntario</option>
                            <option value="ADMINISTRADOR" <?= ($persona->tipo_persona === 'ADMINISTRADOR') ? 'selected' : ''; ?>>Administrador</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto:</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <div class="mb-3">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $credenciales->usuario ?? '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="contrasena">Contraseña:</label>
                        <input type="" class="form-control" id="contrasena" name="contrasena" value="<?= $credenciales->contrasena ?? '' ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>
</body>

</html>
