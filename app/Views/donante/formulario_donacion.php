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

    <!-- Contenido principal -->
    <main>

    <div class="container mt-5">
        <br><br><br>
    <h2>Formulario de Donación</h2>
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session('success') ?>
        </div>
    <?php endif ?>

    <form action="registrarEntrega" method="POST">
        <div class="mb-3 position-relative">
            <label for="fecha_entrega" class="form-label"><i class="fas fa-calendar-alt me-2"></i>Fecha de Entrega:</label>
            <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" required>
        </div>
        <div class="mb-3 position-relative">
            <label for="cantidad_entregada" class="form-label"><i class="fas fa-boxes me-2"></i>Cantidad Entregada:</label>
            <input type="number" class="form-control" id="cantidad_entregada" name="cantidad_entregada" required>
        </div>
        <div class="mb-3 position-relative">
            <label for="observacion" class="form-label"><i class="fas fa-comment-alt me-2"></i>Observación:</label>
            <textarea class="form-control" id="observacion" name="observacion" rows="3"></textarea>
        </div>
        <div class="mb-3 position-relative">
            <label for="responsable_entrega_id" class="form-label"><i class="fas fa-user me-2"></i>Responsable de Entrega:</label>
            <input type="number" class="form-control" id="responsable_entrega_id" name="responsable_entrega_id" >
        </div>
        <div class="mb-3 position-relative">
            <label for="responsable_recepcion_entrega_id" class="form-label"><i class="fas fa-user-check me-2"></i>Responsable de Recepción de Entrega:</label>
            <input type="number" class="form-control" id="responsable_recepcion_entrega_id" name="responsable_recepcion_entrega_id" >
        </div>
        <div class="mb-3 position-relative">
            <label for="org_receptora_id" class="form-label"><i class="fas fa-building me-2"></i>Organización Receptora:</label>
            <input type="number" class="form-control" id="org_receptora_id" name="org_receptora_id" >
        </div>
        <div class="mb-3 position-relative">
            <label for="estado_entrega" class="form-label"><i class="fas fa-info-circle me-2"></i>Estado de Entrega:</label>
            <select class="form-control" id="estado_entrega" name="estado_entrega" required>
                <option value="PENDIENTE">Pendiente</option>
                <option value="COMPLETADA">Completada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Registrar Entrega</button>
    </form>
</div>
    </main>

    <!-- Pie de página -->
    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>

</body>

</html>