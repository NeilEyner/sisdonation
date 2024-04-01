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
        <h1>Editar Producto</h1>
        <form action="<?= site_url('administrador/editarProducto/' . $producto['id_producto']) ?>" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= $producto['nombre'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" value="<?= $producto['descripcion'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="unidad_medida" class="form-label">Unidad de Medida:</label>
                <input type="text" id="unidad_medida" name="unidad_medida" value="<?= $producto['unidad_medida'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría:</label>
                <input type="text" id="categoria" name="categoria" value="<?= $producto['categoria'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="marca" class="form-label">Marca:</label>
                <input type="text" id="marca" name="marca" value="<?= $producto['marca'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento:</label>
                <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" value="<?= $producto['fecha_vencimiento'] ?>" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </main>

    <!-- Pie de página -->
    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>

</body>