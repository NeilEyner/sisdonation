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
            <h1>Gestión de Alimentos Donados</h1>

            <h2>Agregar Nuevo Alimento</h2>
            <form action="<?= base_url('organizacion_benefica/agregar_alimento') ?>" method="post" class="row g-3 needs-validation">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
                </div>
                <div class="col-md-6">
                    <label for="categoria" class="form-label">Categoría:</label>
                    <input type="text" id="categoria" name="categoria" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento:</label>
                    <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="grupo_alimenticio" class="form-label">Grupo Alimenticio:</label>
                    <input type="text" id="grupo_alimenticio" name="grupo_alimenticio" class="form-control" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Agregar Alimento</button>
                </div>
            </form>


            <hr>

            <h2>Alimentos Donados</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alimentos as $alimento) : ?>
                        <tr>
                            <td><?= $alimento['nombre'] ?></td>
                            <td><?= $alimento['descripcion'] ?></td>
                            <td>
                                <a href="<?= base_url('organizacion_benefica/editar_alimento/' . $alimento['id_alimento']) ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="<?= base_url('organizacion_benefica/eliminar_alimento/' . $alimento['id_alimento']) ?>" class="btn btn-sm btn-danger">Eliminar</a>
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