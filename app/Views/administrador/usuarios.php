<!-- app/Views/administrador/usuarios.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <?= $this->include('common/header'); ?>
</head>

<body>
    <!-- Barra de navegación -->
    <header>
        <?= $this->include('common/navbar'); ?>
    </header>
    
    <!-- Contenido principal -->
    <main>
        <br>
        <br>
        <br>
        <div class="container">
            <h1>Usuarios</h1>
            <!-- Botón para agregar nueva persona -->
            <a href="<?= site_url('administrador/agregar_persona') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar Usuarios</a>
            <!-- Tabla para mostrar la lista de personas -->
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>CI</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Tipo de Persona</th>
                        <th>Fecha de Creación</th>
                        <th>Fecha de Actualización</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Iterar sobre los datos de personas y mostrar en la tabla -->
                    <?php foreach ($personas as $persona) : ?>
                        <tr>
                            <td><?= $persona['nombre'] ?></td>
                            <td><?= $persona['apellido'] ?></td>
                            <td><?= $persona['ci'] ?></td>
                            <td><?= $persona['correo'] ?></td>
                            <td><?= $persona['telefono'] ?></td>
                            <td><?= $persona['direccion'] ?></td>
                            <td><?= $persona['fecha_nacimiento'] ?></td>
                            <td><?= $persona['tipo_persona'] ?></td>
                            <td><?= $persona['fecha_creacion'] ?></td>
                            <td><?= $persona['fecha_actualizacion'] ?></td>
                            <td>
                                <!-- Enlaces para editar y eliminar persona -->
                                <a href="<?= site_url('administrador/editar_persona/' . $persona['id_persona']) ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                                <a href="<?= site_url('administrador/eliminar_persona/' . $persona['id_persona']) ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta persona?')"><i class="fas fa-trash-alt"></i> Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="container mt-5">
    <h1>Organizaciones</h1>
    <a href="<?= site_url('administrador/agregar_organizacion') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar Organización</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo de Organización</th>
                <th>Página Web</th>
                <th>Ubicación</th>
                <th>Persona de Contacto</th>
                <th>Teléfono de Contacto</th>
                <th>Email de Contacto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($organizaciones as $organizacion) : ?>
                <tr>
                    <td><?= $organizacion['id_organizacion'] ?></td>
                    <td><?= $organizacion['nombre'] ?></td>
                    <td><?= $organizacion['descripcion'] ?></td>
                    <td><?= $organizacion['tipo_organizacion'] ?></td>
                    <td><?= $organizacion['pagina_web'] ?></td>
                    <td><?= $organizacion['ubicacion'] ?></td>
                    <td><?= $organizacion['persona_contacto'] ?></td>
                    <td><?= $organizacion['telefono_contacto'] ?></td>
                    <td><?= $organizacion['email_contacto'] ?></td>
                    <td>
                        <a href="<?= site_url('administrador/editar_organizacion/' . $organizacion['id_organizacion']) ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</a>
                        <a href="<?= site_url('administrador/eliminar_organizacion/' . $organizacion['id_organizacion']) ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta organización?')"><i class="fas fa-trash-alt"></i> Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

    </main>

    <!-- Pie de página -->
    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>



</body>

</html>