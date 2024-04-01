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
            <h1 class="mb-4">Lista de Productos</h1>
            <?php if (!empty($productos)) : ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Unidad de Medida</th>
                                <th>Categoría</th>
                                <th>Marca</th>
                                <th>Fecha de Vencimiento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos as $producto) : ?>
                                <tr>
                                    <td><?= $producto['nombre'] ?></td>
                                    <td><?= $producto['descripcion'] ?></td>
                                    <td><?= $producto['unidad_medida'] ?></td>
                                    <td><?= $producto['categoria'] ?></td>
                                    <td><?= $producto['marca'] ?></td>
                                    <td><?= $producto['fecha_vencimiento'] ?></td>
                                    <td>
                                        <a href="<?= site_url('productos/editar/' . $producto['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="<?= site_url('productos/eliminar/' . $producto['id']) ?>" class="btn btn-sm btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <p>No hay productos disponibles.</p>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>
</body>
</html>
