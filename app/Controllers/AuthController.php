<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AutenticacionModel;
use App\Models\PersonaModel;

class AuthController extends BaseController
{
    protected $autenticacionModel;
    protected $personaModel;

    public function __construct()
    {
        $this->autenticacionModel = new AutenticacionModel();
        $this->personaModel = new PersonaModel();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function cerrar_sesion()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function iniciar_sesion()
    {
    var_dump($_POST);


        $usuario = $this->request->getVar('usuario');
        $contrasena = $this->request->getVar('contrasena');

        if ($this->autenticacionModel->verificar_credenciales($usuario, $contrasena)) {
            $tipoUsuario = $this->autenticacionModel->obtener_tipo_usuario($usuario);
            $nombre = $this->personaModel->obtenerNombrePersona($this->autenticacionModel->obtener_id_persona($usuario));
            session()->set([
                'tipo_usuario' => $tipoUsuario,
                'nombre_usuario' => $nombre,
            ]);

            return redirect()->to(strtolower($tipoUsuario) . '/dashboard');
        }

        return redirect()->to('login')->with('mensaje', 'Credenciales inválidas');
    }
}
