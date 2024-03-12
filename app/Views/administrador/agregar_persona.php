<!-- Views/administrador/agregar_persona.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Persona</title>
</head>

<body>
    <h1>Agregar Persona</h1>
    <br>
    <form method="post" action="<?php echo base_url().'administrador/agregar-persona'  ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>
        <br>
        <label for="ci">CI:</label>
        <input type="text" name="ci" required>
        <br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" required>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" required>
        <br>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" required>
        <br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" required>
        <br>
        <label for="tipo_persona">Tipo de Persona:</label>
        <select name="tipo_persona" required>
            <option value="CASUAL">Casual</option>
            <option value="VOLUNTARIO">Voluntario</option>
            <option value="ADMINISTRADOR">Administrador</option>
        </select>
        <br>
        <label for="foto">Foto:</label>
        <input type="file" name="foto">
        <br>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>
        <br>
        <input type="submit" value="Agregar Persona">

    </form>
</body>

</html>