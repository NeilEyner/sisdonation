<?php

namespace App\Models;

use CodeIgniter\Model;

class OrganizacionModel extends Model
{
    protected $table = 'organizacion';
    protected $primaryKey = 'id_organizacion';
    protected $allowedFields = ['nombre', 'descripcion', 'tipo_organizacion', 'pagina_web', 'ubicacion', 'persona_contacto', 'telefono_contacto', 'email_contacto'];
    protected $useTimestamps = false;

    public function agregarOrganizacion($organizacionData)
    {
        try {
            return $this->insert($organizacionData);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function obtenerOrganizacion($id)
    {
        return $this->find($id);
    }

    public function actualizarOrganizacion($id, $data)
    {
        try {
            return $this->update($id, $data);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function eliminarOrganizacion($id)
    {
        try {
            return $this->delete($id);
        } catch (\Exception $e) {
            return false;
        }
    }
}
