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
    <br>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto) : ?>
                            <tr>
                                <td><?php echo $producto['nombre']; ?></td>
                                <td><?php echo $producto['descripcion']; ?></td>
                                <td><?php echo $producto['unidad_medida']; ?></td>
                                <td><?php echo $producto['categoria']; ?></td>
                                <td><?php echo $producto['marca']; ?></td>
                                <td><?php echo $producto['fecha_vencimiento']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p>No hay productos disponibles.</p>
        <?php endif; ?>

        <h1 class="mt-5 mb-4">Lista de Alimentos</h1>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alimentos as $alimento) : ?>
                            <tr>
                                <td><?php echo $alimento['nombre']; ?></td>
                                <td><?php echo $alimento['descripcion']; ?></td>
                                <td><?php echo $alimento['categoria']; ?></td>
                                <td><?php echo $alimento['fecha_vencimiento']; ?></td>
                                <td><?php echo $alimento['grupo_alimenticio']; ?></td>
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

    <!-- Pie de página -->
    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>



</body>

</html>