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
        <h1>Editar Alimento</h1>
        <form action="<?= site_url('administrador/editarAlimento/' . $alimento['id_alimento']) ?>" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= $alimento['nombre'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" value="<?= $alimento['descripcion'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría:</label>
                <input type="text" id="categoria" name="categoria" value="<?= $alimento['categoria'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento:</label>
                <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" value="<?= $alimento['fecha_vencimiento'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="grupo_alimenticio" class="form-label">Grupo Alimenticio:</label>
                <input type="text" id="grupo_alimenticio" name="grupo_alimenticio" value="<?= $alimento['grupo_alimenticio'] ?>" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </main>

    <!-- Pie de página -->
    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>

</body>