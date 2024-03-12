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
        <div class="container">
            <h1>Sys Donacion</h1>
            <p>...</p>

            <!-- Inserta aquí el contenido específico de tu vista base -->
            <?= $this->include('home/base'); ?>
        </div>
    </main>

    <!-- Pie de página -->
    <footer>
        <?= $this->include('common/footer'); ?>
    </footer>

</body>

</html>
