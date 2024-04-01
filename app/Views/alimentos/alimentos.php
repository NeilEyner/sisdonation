<!DOCTYPE html>
<html lang="es">
<head>
    <?= $this->include('common/header'); ?>
</head>
<body>
    <header>
        <?= $this->include('common/navbar'); ?>
    </header>
    <main>
        <div class="container mt-5">
            <h1 class="mb-4">Lista de Alimentos</h1>
            <?php if (!empty($alimentos)) : ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
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
                                    <td><?= $alimento['nombre'] ?></td>
                                    <td><?= $alimento['descripcion'] ?></td>
                                    <td><?= $alimento['categoria'] ?></td>
                                    <td><?= $alimento['fecha_vencimiento'] ?></td>
                                    <td><?= $alimento['grupo_alimenticio'] ?></td>
                                    <td>
                                        <a href="<?= site_url('alimentos/editar/' . $alimento['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="<?= site_url('alimentos/eliminar/' . $alimento['id']) ?>" class="btn btn-sm btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <p>No hay alimentos disponibles.</p>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>
</body>
</html>
