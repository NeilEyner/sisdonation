<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonaModel extends Model
{
    protected $table = 'persona';
    protected $primaryKey = 'id_persona';
    protected $allowedFields = ['nombre', 'apellido', 'ci', 'correo', 'telefono', 'direccion', 'fecha_nacimiento', 'tipo_persona', 'foto', 'fecha_creacion', 'fecha_actualizacion'];
    protected $useTimestamps = false;
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_actualizacion';
    public function agregarPersona($personaData)
    {
        // Manejar errores
        try {
            return $this->insert($personaData);
        } catch (\Exception $e) {
            return false;
        }
    }
    public function obtenerPersona($id)
    {
        // Obtener los detalles de una persona por su ID
        // Usar find() si estás buscando por clave primaria
        return $this->find($id);
    }
    public function obtenerNombrePersona($id)
    {
        // Obtener solo el nombre de la persona por su ID
        $persona = $this->find($id);
    
        // Verificar si se encontró la persona
        if ($persona && array_key_exists('nombre', $persona)) {
            // Devolver el nombre de la persona
            return $persona['nombre'];
        } else {
            // Si no se encuentra la persona o no tiene la clave 'nombre', devolver un valor por defecto o manejar el error según tus necesidades
            return $id;
        }
    }
    
    
    


    public function actualizarPersona($id, $data)
    {
        // Actualizar los datos de una persona por su ID
        // Manejar errores
        try {
            return $this->update($id, $data);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function eliminarPersona($id)
    {
        // Eliminar una persona por su ID
        // Manejar errores
        try {
            return $this->delete($id);
        } catch (\Exception $e) {
            return false;
        }
    }
}
