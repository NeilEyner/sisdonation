<?php

namespace App\Models;

use CodeIgniter\Model;

class RecepcionDonacionModel extends Model
{
    protected $table = 'Recepcion_Donaciones';
    protected $primaryKey = 'id_recepcion';
    protected $allowedFields = ['fecha_recepcion', 'cantidad_total', 'observacion', 'persona_realiza_id', 'responsable_r_id', 'organizacion_realiza_id'];
    protected $useTimestamps = false; // Deshabilita el uso de timestamps

    // Obtener todas las donaciones
    public function getDonaciones()
    {
        return $this->findAll();
    }

    // Función para obtener una donación por su ID
    public function getDonacionPorId($id)
    {
        return $this->find($id);
    }

    // Función para agregar una nueva donación
    public function agregarDonacion($data)
    {
        return $this->insert($data);
    }

    // Función para actualizar una donación existente
    public function actualizarDonacion($id, $data)
    {
        return $this->update($id, $data);
    }

    // Función para eliminar una donación
    public function eliminarDonacion($id)
    {
        return $this->delete($id);
    }
}
