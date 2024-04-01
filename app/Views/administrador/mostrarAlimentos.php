<!DOCTYPE html>
<html lang="es">

<head>
    <?= $this->include('common/header'); ?>
</head>

<body class="">

    <!-- Barra de navegación -->
    <header>
        <?= $this->include('common/navbar'); ?>

    </header>
    <main class="container">
        <br>
        <br><br>
        <h1>Lista de Alimentos</h1>
        <a href="<?= site_url('administrador/agregarAlimento') ?>" class="btn btn-primary mb-3">
            <i class="fas fa-plus me-1"></i> Agregar Alimento
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Grupo Alimenticio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alimentos as $alimento) : ?>
                    <tr>
                        <td><?= $alimento['id_alimento'] ?></td>
                        <td><?= $alimento['nombre'] ?></td>
                        <td><?= $alimento['descripcion'] ?></td>
                        <td><?= $alimento['categoria'] ?></td>
                        <td><?= $alimento['fecha_vencimiento'] ?></td>
                        <td><?= $alimento['grupo_alimenticio'] ?></td>
                        <td>
                            <a href="<?= site_url('administrador/editarAlimento/' . $alimento['id_alimento']) ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="<?= site_url('administrador/eliminarAlimento/' . $alimento['id_alimento']) ?>" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <!-- Pie de página -->
    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>

</body>