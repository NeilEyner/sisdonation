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

    <!-- Contenido principal -->
    <main>
        <br>
        <br>
        <br>
        <!-- Contenido del dashboard -->
        <div class="container mt-4">
            <h2>Bienvenido, <?= session()->get('tipo_usuario') ?></h2>
            
        </div>

    </main>

    <!-- Pie de página -->
    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>



</body>

</html>