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
        <h1>Lista de Productos</h1>
        <a href="<?= site_url('administrador/agregarProducto') ?>" class="btn btn-primary mb-3">Agregar Producto</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
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
                        <td><?= $producto['id_producto'] ?></td>
                        <td><?= $producto['nombre'] ?></td>
                        <td><?= $producto['descripcion'] ?></td>
                        <td><?= $producto['unidad_medida'] ?></td>
                        <td><?= $producto['categoria'] ?></td>
                        <td><?= $producto['marca'] ?></td>
                        <td><?= $producto['fecha_vencimiento'] ?></td>
                        <td>
                            <a href="<?= site_url('administrador/editarProducto/' . $producto['id_producto']) ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="<?= site_url('administrador/eliminarProducto/' . $producto['id_producto']) ?>" class="btn btn-sm btn-danger">Eliminar</a>
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