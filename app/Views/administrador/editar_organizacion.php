<!DOCTYPE html>
<html lang="es">

<head>
    <?= $this->include('common/header'); ?>
</head>

<body>

    <div class="container mt-5">
        <h1 class="mb-4">Editar Organización</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="<?= site_url('administrador/guardar_edicion_organizacion/' . $organizacion->id_organizacion) ?>" method="post">
                    <div class="mb-3">
                        <label for="nombre_org" class="form-label">Nombre de la Organización:</label>
                        <input type="text" class="form-control" id="nombre_org" name="nombre_org" value="<?= $organizacion->nombre; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $organizacion->descripcion; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_organizacion" class="form-label">Tipo de Organización:</label>
                        <select class="form-select" id="tipo_organizacion" name="tipo_organizacion" required>
                            <option value="ORG_BENEFICA" <?= ($organizacion->tipo_organizacion === 'ORG_BENEFICA') ? 'selected' : ''; ?>>Organización Benefica</option>
                            <option value="ORG_RECEPTORA" <?= ($organizacion->tipo_organizacion === 'ORG_RECEPTORA') ? 'selected' : ''; ?>>Organización Receptora</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pagina_web" class="form-label">Página Web:</label>
                        <input type="text" class="form-control" id="pagina_web" name="pagina_web" value="<?= $organizacion->pagina_web; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación:</label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="<?= $organizacion->ubicacion; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="persona_contacto" class="form-label">Persona de Contacto:</label>
                        <input type="text" class="form-control" id="persona_contacto" name="persona_contacto" value="<?= $organizacion->persona_contacto; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="telefono_contacto" class="form-label">Teléfono de Contacto:</label>
                        <input type="text" class="form-control" id="telefono_contacto" name="telefono_contacto" value="<?= $organizacion->telefono_contacto; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email_contacto" class="form-label">Email de Contacto:</label>
                        <input type="email" class="form-control" id="email_contacto" name="email_contacto" value="<?= $organizacion->email_contacto; ?>">
                    </div>
                </div>
                <div class="col-md-6">
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
