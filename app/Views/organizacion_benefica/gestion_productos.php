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
    <main>
        <div class="container">
            <br>
            <h1 class="text-center">Gestión de Productos Donados</h1>

            <h2 class="text-center">Agregar Nuevo Producto</h2>
            <form class="row g-3 needs-validation" action="<?= base_url('organizacion_benefica/agregar_producto') ?>" method="post">
                <div class="col-md-6">
                    <input type="text" name="nombre" placeholder="Nombre del producto" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="descripcion" placeholder="Descripción" class="form-control" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                </div>
            </form>

            <hr>

            <h2 class="text-center">Productos Donados</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) : ?>
                        <tr>
                            <td><?= $producto['nombre'] ?></td>
                            <td><?= $producto['descripcion'] ?></td>
                            <td>
                                <a href="<?= base_url('organizacion_benefica/editar_producto/' . $producto['id_producto']) ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="<?= base_url('organizacion_benefica/eliminar_producto/' . $producto['id_producto']) ?>" class="btn btn-sm btn-danger">Eliminar</a>
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