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

        <!-- Inserta aquí el contenido específico de tu vista base -->
        <?= $this->include('home/inicio'); ?>
        <?= $this->include('home/quienes_somos'); ?>
        <?= $this->include('home/donaciones'); ?>
        <?= $this->include('home/contacto'); ?>
        <?= $this->include('home/preguntas'); ?>
    </main>

    <!-- Pie de página -->
    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>

</body>

</html>