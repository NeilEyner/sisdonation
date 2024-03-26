<!DOCTYPE html>
<html lang="es">

<head>
    <?= $this->include('common/header'); ?>
</head>

<body>

    <div class="container mt-5">
        <h1 class="mb-4">Agregar Organización</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="<?php echo base_url() . 'administrador/agregar-organizacion'  ?>" method="post">
                    <div class="mb-3">
                        <label for="nombre_org" class="form-label">Nombre de la Organización:</label>
                        <input type="text" class="form-control" id="nombre_org" name="nombre_org" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_organizacion" class="form-label">Tipo de Organización:</label>
                        <select class="form-select" id="tipo_organizacion" name="tipo_organizacion" required>
                            <option value="ORG_BENEFICA">Organización Benefica</option>
                            <option value="ORG_RECEPTORA">Organización Receptora</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pagina_web" class="form-label">Página Web:</label>
                        <input type="text" class="form-control" id="pagina_web" name="pagina_web">
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación:</label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion">
                    </div>
                    <div class="mb-3">
                        <label for="persona_contacto" class="form-label">Persona de Contacto:</label>
                        <input type="text" class="form-control" id="persona_contacto" name="persona_contacto">
                    </div>
                    <div class="mb-3">
                        <label for="telefono_contacto" class="form-label">Teléfono de Contacto:</label>
                        <input type="text" class="form-control" id="telefono_contacto" name="telefono_contacto">
                    </div>
                    <div class="mb-3">
                        <label for="email_contacto" class="form-label">Email de Contacto:</label>
                        <input type="email" class="form-control" id="email_contacto" name="email_contacto">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Organización</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>
</body>

</html>
