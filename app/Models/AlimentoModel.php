<?php

namespace App\Models;

use CodeIgniter\Model;

class AlimentoModel extends Model
{
    protected $table = 'alimentos'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_alimento'; // Clave primaria de la tabla

    protected $allowedFields = ['nombre', 'descripcion', 'categoria', 'fecha_vencimiento', 'grupo_alimenticio']; // Campos permitidos para operaciones CRUD

    // protected $useTimestamps = true; // Habilita el uso de timestamps

    // protected $createdField  = 'created_at'; // Campo para almacenar la fecha de creación
    // protected $updatedField  = 'updated_at'; // Campo para almacenar la fecha de actualización

    // Reglas de validación
    protected $validationRules    = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'categoria' => 'required',
        'fecha_vencimiento' => 'required|valid_date',
        'grupo_alimenticio' => 'required'
    ];

    // Mensajes de validación
    protected $validationMessages = [
        'fecha_vencimiento' => [
            'valid_date' => 'El campo fecha de vencimiento debe ser una fecha válida.'
        ]
    ];

    // Obtener todos los alimentos
    public function getAlimentos()
    {
        return $this->findAll();
    }

    // Función para obtener un alimento por su ID
    public function getAlimentoPorId($id)
    {
        return $this->find($id);
    }

    // Función para agregar un nuevo alimento
    public function agregarAlimento($data)
    {
        return $this->insert($data);
    }

    // Función para actualizar un alimento existente
    public function actualizarAlimento($id, $data)
    {
        return $this->update($id, $data);
    }

    // Función para eliminar un alimento
    public function eliminarAlimento($id)
    {
        return $this->delete($id);
    }
}
