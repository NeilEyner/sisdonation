<?php
// Calcula el número de registros en cada conjunto de datos
$num_personas = count($personas)+1;
$num_organizaciones = count($organizaciones);
$num_recepciones = count($recepciones);
$num_entregas = count($entregas);
$num_donaciones = count($donaciones);
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">DASHBOARD</h1>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        <div class="col">
            <div class="card text-center bg-light rounded shadow">
                <div class="card-body">
                    <i class="fas fa-users fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Personas</h5>
                    <p class="card-text display-4 text-primary"><?= $num_personas ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center bg-light rounded shadow">
                <div class="card-body">
                    <i class="fas fa-building fa-3x mb-3 text-danger"></i>
                    <h5 class="card-title">Organizaciones</h5>
                    <p class="card-text display-4 text-danger"><?= $num_organizaciones ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center bg-light rounded shadow">
                <div class="card-body">
                    <i class="fas fa-box-open fa-3x mb-3 text-success"></i>
                    <h5 class="card-title">Recepciones</h5>
                    <p class="card-text display-4 text-success"><?= $num_recepciones ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center bg-light rounded shadow">
                <div class="card-body">
                    <i class="fas fa-truck fa-3x mb-3 text-warning"></i>
                    <h5 class="card-title">Entregas</h5>
                    <p class="card-text display-4 text-warning"><?= $num_entregas ?></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center bg-light rounded shadow">
                <div class="card-body">
                    <i class="fas fa-hand-holding-heart fa-3x mb-3 text-info"></i>
                    <h5 class="card-title">Donaciones</h5>
                    <p class="card-text display-4 text-info"><?= $num_donaciones ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
