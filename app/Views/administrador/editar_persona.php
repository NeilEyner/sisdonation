<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
</head>

<body>

    <form action="<?= site_url('administrador/guardar_edicion_persona/' . $persona->id_persona) ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= $persona->nombre; ?>" required>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?= $persona->apellido; ?>" required>
        <br>
        <label for="ci">CI:</label>
        <input type="text" name="ci" value="<?= $persona->ci; ?>" required>
        <br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" value="<?= $persona->correo; ?>" required>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" value="<?= $persona->telefono; ?>" required>
        <br>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="<?= $persona->direccion; ?>" required>
        <br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" value="<?= $persona->fecha_nacimiento; ?>" required>
        <br>
        <label for="tipo_persona">Tipo de Persona:</label>
        <select name="tipo_persona" required>
            <option value="ORGANIZACION" <?= ($persona->tipo_persona === 'ORGANIZACION') ? 'selected' : ''; ?>>Organización</option>
            <option value="VOLUNTARIO" <?= ($persona->tipo_persona === 'VOLUNTARIO') ? 'selected' : ''; ?>>Voluntario</option>
            <option value="ADMINISTRADOR" <?= ($persona->tipo_persona === 'ADMINISTRADOR') ? 'selected' : ''; ?>>Administrador</option>
        </select>
        <br>
        <label for="foto">Foto:</label>
        <input type="file" name="foto">
        <br>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" value="<?= $datosAutenticacion['usuario'] ?? ''; ?>" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" value="<?= $datosAutenticacion['contrasena'] ?? ''; ?>" required>
        <br>
        <input type="submit" value="Guardar cambios">
    </form>

</body>

</html>
