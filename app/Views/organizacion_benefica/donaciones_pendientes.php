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
    <div class="container">
        <br>
        <h1>Donaciones Pendientes</h1>

        <!-- Tabla para mostrar información sobre las donaciones pendientes -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha de Entrega</th>
                    <th>Cantidad Entregada</th>
                    <th>Observación</th>
                    <th>Responsable de Entrega</th>
                    <th>Responsable de Recepción</th>
                    <th>Organización Receptora</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($donacionesPendientes as $donacion) : ?>
                <tr>
                    <td><?= $donacion['id_entrega'] ?></td>
                    <td><?= date("d/m/Y", strtotime($donacion['fecha_entrega'])) ?></td>
                    <td><?= $donacion['cantidad_entregada'] ?></td>
                    <td><?= $donacion['observacion'] ?: 'N/A' ?></td>
                    <td><?= $donacion['responsable_entrega_id'] ?></td>
                    <td><?= $donacion['responsable_recepcion_entrega_id'] ?></td>
                    <td><?= $donacion['org_receptora_id'] ?></td>
                    <td><?= ucfirst(strtolower($donacion['estado_entrega'])) ?></td>
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
