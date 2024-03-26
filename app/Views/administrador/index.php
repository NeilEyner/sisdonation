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
    <main>
        <?= $this->include('administrador/estadisticas') ?>
        <?= view('administrador/dashboard') ?>
    </main>

    <!-- Pie de página -->
    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>

</body>