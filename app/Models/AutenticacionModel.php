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
        $query = $this->where(['usuario' => $usuario, 'contrasena' => $contrasena])->get();
        return ($query->getRow() !== null);
    }

    public function obtener_tipo_usuario($usuario)
    {
        $query = $this->select('tipo_persona')->where('usuario', $usuario)->get();
        return ($query->getRow() !== null) ? $query->getRow()->tipo_persona : null;
    }
    public function obtener_id_persona($usuario)
    {

        $query = $this->select('persona_id')->where('usuario', $usuario)->get();
        $result = $query->getRow();
        return ($result !== null) ? $result->persona_id : null;
    }
    public function actualizarAutentication($id, $data)
    {
        return $this->update($id, $data);
    }
    public function obtener_credenciales_por_id($id)
    {
        $query = $this->select('usuario, contrasena')->find($id);
        return ($query !== null) ? $query : null;
    }
    public function obtener_credenciales_por_id_org($organizacion_id)
    {
        $query = $this->select('usuario, contrasena')->where('organizacion_id', $organizacion_id)->get();
        return ($query->getRow() !== null) ? $query->getRow() : null;
    }
    public function obtener_credenciales_por_id_persona($persona_id)
    {
        $query = $this->select('usuario, contrasena')
            ->where('persona_id', $persona_id)
            ->get();
        return ($query->getRow() !== null) ? $query->getRow() : null;
    }
}
