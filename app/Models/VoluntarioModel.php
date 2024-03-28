<?php

namespace App\Models;

use CodeIgniter\Model;

class VoluntarioModel extends Model
{
    protected $table = 'voluntario'; // Cambia 'actividades' por el nombre de tu tabla de actividades

    // Método para obtener las actividades registradas por el voluntario
    public function obtenerActividades($idUsuario)
    {
        return $this->where('id_voluntario', $idUsuario)->findAll(); // Suponiendo que 'id_usuario' sea el campo que indica el usuario asociado a la actividad
    }
}
