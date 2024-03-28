<?php

namespace App\Models;

use CodeIgniter\Model;

class EntregaDonacionModel extends Model
{
    protected $table = 'entrega_donaciones'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_entrega'; // Clave primaria de la tabla

    protected $allowedFields = ['fecha_entrega', 'cantidad_entregada', 'observacion', 'responsable_entrega_id', 'responsable_recepcion_entrega_id', 'org_receptora_id', 'estado_entrega']; // Campos permitidos para operaciones CRUD

    protected $useTimestamps = false; // Deshabilita el uso de timestamps

    // Obtener todas las entregas de donaciones
    public function getEntregasDonaciones()
    {
        return $this->findAll();
    }

    // Función para obtener una entrega de donación por su ID
    public function getEntregaDonacionPorId($id)
    {
        return $this->find($id);
    }

    // Función para agregar una nueva entrega de donación
    public function agregarEntregaDonacion($data)
    {
        return $this->insert($data);
    }

    // Función para actualizar una entrega de donación existente
    public function actualizarEntregaDonacion($id, $data)
    {
        return $this->update($id, $data);
    }

    // Función para eliminar una entrega de donación
    public function eliminarEntregaDonacion($id)
    {
        return $this->delete($id);
    }

    // Función para obtener donaciones pendientes
    public function obtenerDonacionesPendientes()
    {
        return $this->where('estado_entrega', 'PENDIENTE')->findAll();
    }
}
