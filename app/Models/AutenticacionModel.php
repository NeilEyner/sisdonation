<?php

namespace App\Models;

use CodeIgniter\Model;

class AutenticacionModel extends Model
{
    protected $table = 'Autenticacion';
    protected $primaryKey = 'id_autenticacion';
    protected $allowedFields = ['usuario', 'contrasena', 'persona_id', 'organizacion_id', 'tipo_persona'];

    public function verificar_credenciales($usuario, $contrasena)
    {
        // Lógica para verificar las credenciales en la base de datos
        $query = $this->where(['usuario' => $usuario, 'contrasena' => $contrasena])->get();
        return ($query->getRow() !== null);
    }

    public function obtener_tipo_usuario($usuario)
    {
        // Lógica para obtener el tipo de usuario desde la base de datos
        $query = $this->select('tipo_persona')->where('usuario', $usuario)->get();

        return ($query->getRow() !== null) ? $query->getRow()->tipo_persona : null;
    }
    public function obtener_id_persona($usuario)
    {
        // Lógica para obtener el tipo de usuario desde la base de datos
        $query = $this->select('persona_id')->where('usuario', $usuario)->get();

        $result = $query->getRow();
    
        return ($result !== null) ? $result->persona_id : null;
    }
    public function actualizarAutentication($id, $data)
    {
        return $this->update($id, $data);
    }
    // Otros métodos del modelo según sea necesario...
}
