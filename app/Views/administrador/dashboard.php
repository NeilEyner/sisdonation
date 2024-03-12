<!-- administrador/index.php -->
<?php if (isset($personas)) : ?>
    <h1>Lista de Personas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>CI</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Fecha Nacimiento</th>
                <th>Tipo Persona</th>
                <!-- Agregar más columnas según tus campos -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personas as $persona) : ?>
                <tr>
                    <td><?= $persona['id_persona'] ?></td>
                    <td><?= $persona['nombre'] ?></td>
                    <td><?= $persona['apellido'] ?></td>
                    <td><?= $persona['ci'] ?></td>
                    <td><?= $persona['correo'] ?></td>
                    <td><?= $persona['telefono'] ?></td>
                    <td><?= $persona['direccion'] ?></td>
                    <td><?= $persona['fecha_nacimiento'] ?></td>
                    <td><?= $persona['tipo_persona'] ?></td>
                    <!-- Agregar más columnas según tus campos -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>
<h1>Lista de Organizaciones</h1>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Tipo de Organización</th>
            <th>Página Web</th>
            <th>Ubicación</th>
            <!-- Agrega más columnas según sea necesario -->
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
                <!-- Agrega más celdas según sea necesario -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h1>Recepcion_Donaciones</h1>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha Recepción</th>
            <th>Cantidad Total</th>
            <th>Observación</th>
            <th>Persona Realiza</th>
            <th>Responsable</th>
            <th>Organización Realiza</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recepciones as $recepcion) : ?>
        <tr>
            <td><?= $recepcion['id_recepcion'] ?></td>
            <td><?= $recepcion['fecha_recepcion'] ?></td>
            <td><?= $recepcion['cantidad_total'] ?></td>
            <td><?= $recepcion['observacion'] ?></td>
            <td><?= $recepcion['persona_realiza_id'] ?></td>
            <td><?= $recepcion['responsable_r_id'] ?></td>
            <td><?= $recepcion['organizacion_realiza_id'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h1>Entrega_Donaciones</h1>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha Entrega</th>
            <th>Cantidad Entregada</th>
            <th>Observación</th>
            <th>Responsable Entrega</th>
            <th>Responsable Recepción</th>
            <th>Organización Receptora</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($entregas as $entrega) : ?>
        <tr>
            <td><?= $entrega['id_entrega'] ?></td>
            <td><?= $entrega['fecha_entrega'] ?></td>
            <td><?= $entrega['cantidad_entregada'] ?></td>
            <td><?= $entrega['observacion'] ?></td>
            <td><?= $entrega['responsable_entrega_id'] ?></td>
            <td><?= $entrega['responsable_recepcion_entrega_id'] ?></td>
            <td><?= $entrega['org_receptora_id'] ?></td>
            <td><?= $entrega['estado_entrega'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h1>Lista de Donaciones</h1>

    <table border="1">
        <tr>
            <th>ID Donación</th>
            <th>Fecha Entrega</th>
            <th>Cantidad Entregada</th>
            <th>Responsable</th>
            <th>Organización Receptora</th>
        </tr>

        <?php foreach ($donaciones as $entrega): ?>
            <tr>
                <td><?= $entrega['id_entrega'] ?></td>
                <td><?= $entrega['fecha_entrega'] ?></td>
                <td><?= $entrega['cantidad_entregada'] ?></td>
                <td><?= $entrega['responsable_nombre'] ?></td>
                <td><?= $entrega['organizacion_nombre'] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>


<!-- Agrega tus scripts JavaScript aquí si es necesario -->