<?php

namespace App\Models;

use CodeIgniter\Model;

class AlimentoModel extends Model
{
    protected $table = 'Alimentos';
    protected $primaryKey = 'id_alimento';
    protected $allowedFields = ['nombre', 'descripcion', 'categoria', 'fecha_vencimiento', 'grupo_alimenticio'];
}
