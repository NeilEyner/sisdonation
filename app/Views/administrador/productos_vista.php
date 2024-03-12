<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos y Alimentos</title>
</head>
<body>

    <h1>Lista de Productos</h1>
    <?php if (!empty($productos)) : ?>
        <table border="1">
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
    <?php else : ?>
        <p>No hay productos disponibles.</p>
    <?php endif; ?>

    <h1>Lista de Alimentos</h1>
    <?php if (!empty($alimentos)) : ?>
        <table border="1">
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
    <?php else : ?>
        <p>No hay alimentos disponibles.</p>
    <?php endif; ?>

</body>
</html>
