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
            <br>
            <br>
            <h1>Panel de seguimiento Donaciones</h1>

            <!-- Tabla para mostrar información sobre las donaciones pendientes -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Entrega</th>
                        <th>Fecha de Entrega</th>
                        <th>Cantidad Entregada</th>
                        <th>Observación</th>
                        <th>Responsable de Entrega</th>
                        <th>Responsable de Recepción</th>
                        <th>Organización Receptora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donacionesPendientes as $donacion) : ?>
                        <tr>
                            <td><?= $donacion['id_entrega'] ?></td>
                            <td><?= $donacion['fecha_entrega'] ?></td>
                            <td><?= $donacion['cantidad_entregada'] ?></td>
                            <td><?= $donacion['observacion'] ?></td>
                            <td><?= $donacion['responsable_entrega_id'] ?></td>
                            <td><?= $donacion['responsable_recepcion_entrega_id'] ?></td>
                            <td><?= $donacion['org_receptora_id'] ?></td>
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
