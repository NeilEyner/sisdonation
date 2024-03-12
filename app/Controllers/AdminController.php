<?php

namespace App\Controllers;

helper('form');

use CodeIgniter\Controller;
use App\Models\PersonaModel;
use App\Models\AutenticacionModel;
use App\Models\DonacionesModel;


class AdminController extends BaseController
{

    public function mostrarPersonasEntregasRecepciones()
    {
        $db = \Config\Database::connect();
        // Realizar consulta para obtener productos
        $PersonaQuery = $db->table('Persona')->get();
        $data['personas'] = $PersonaQuery->getResultArray();

        $RecepcionQuery = $db->table('recepcion_donaciones')->get();
        $data['recepciones'] = $RecepcionQuery->getResultArray();

        // Realizar consulta para obtener alimentos
        $EntregaQuery = $db->table('entrega_donaciones')->get();
        $data['entregas'] = $EntregaQuery->getResultArray();

        $organizacionQuery = $db->table('organizacion')->get();
        $data['organizaciones'] = $organizacionQuery->getResultArray();

        $DonacionQuery = $db->table('entrega_donaciones')
            ->join('voluntario_entrega_donacion', 'voluntario_entrega_donacion.entrega_id = entrega_donaciones.id_entrega')
            ->join('Voluntario', 'Voluntario.id_voluntario = voluntario_entrega_donacion.voluntario_id')
            ->join('Persona', 'Persona.id_persona = Voluntario.persona_id')  // Unir con la tabla 'Persona'
            ->join('Org_Receptora', 'Org_Receptora.id_org_receptora = entrega_donaciones.org_receptora_id')
            ->join('Organizacion', 'Organizacion.id_organizacion = Org_Receptora.id_org_receptora')  // Unir con la tabla 'Organizacion'
            ->select('entrega_donaciones.*, Persona.nombre as responsable_nombre, Organizacion.nombre as organizacion_nombre')
            ->get();
        $data['donaciones'] = $DonacionQuery->getResultArray();


        return view('administrador/index', $data);
    }

    public function mostrarProductos()
    {
        // Cargar la base de datos
        $db = \Config\Database::connect();

        // Realizar consulta para obtener productos
        $productosQuery = $db->table('Productos')->get();
        $data['productos'] = $productosQuery->getResultArray();

        // Realizar consulta para obtener alimentos
        $alimentosQuery = $db->table('Alimentos')->get();
        $data['alimentos'] = $alimentosQuery->getResultArray();

        // Cargar la vista con los datos
        return view('administrador/productos_vista', $data);
    }
    public function usuarios()
    {
        // Cargar el modelo
        $db = \Config\Database::connect();
        // Realizar consulta para obtener productos
        $PersonaQuery = $db->table('Persona')->get();
        $data['personas'] = $PersonaQuery->getResultArray();

        // $RecepcionQuery = $db->table('recepcion_donaciones')->get();
        // $data['recepciones'] = $RecepcionQuery->getResultArray();

        // // Realizar consulta para obtener alimentos
        // $EntregaQuery = $db->table('entrega_donaciones')->get();
        // $data['entregas'] = $EntregaQuery->getResultArray();

        $organizacionQuery = $db->table('organizacion')->get();
        $data['organizaciones'] = $organizacionQuery->getResultArray();


        // Cargar la vista de usuarios con los datos
        return view('administrador/usuarios', $data);
    }
    // Controlador: AdminController.php

    // app/Controllers/AdminController.php
public function agregarPersona()
{
    if ($this->request->getMethod() === 'post') {
        $nombre = $this->request->getPost('nombre');
        $apellido = $this->request->getPost('apellido');
        $ci = $this->request->getPost('ci');
        $correo = $this->request->getPost('correo');
        $telefono = $this->request->getPost('telefono');
        $direccion = $this->request->getPost('direccion');
        $fechaNacimiento = $this->request->getPost('fecha_nacimiento');
        $tipoPersona = $this->request->getPost('tipo_persona');
        $fotoNombre = $this->request->getPost('foto');
        $usuario = $this->request->getPost('usuario');

        // Construir el array de datos para la persona
        $personaData = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'ci' => $ci,
            'correo' => $correo,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'fecha_nacimiento' => $fechaNacimiento,
            'tipo_persona' => $tipoPersona,
            'foto' => $fotoNombre,
        ];

        // Instanciar el modelo
        $personaModel = new PersonaModel();

        // Realizar la inserción a través del método del modelo
        if ($personaModel->agregarPersona($personaData)) {
            // Obtener el ID de la persona recién insertada
            $personaId = $personaModel->getInsertID();

            // Obtener la contraseña del formulario
            $contrasena = $this->request->getPost('contrasena');

            // Instanciar el modelo de autenticación
            $authModel = new AutenticacionModel();

            // Construir el array de datos para la autenticación
            $authData = [
                'usuario' => $usuario,
                'contrasena' => $contrasena,
                'persona_id' => $personaId,
                'tipo_persona' => $tipoPersona,
            ];

            // Insertar datos de autenticación en la base de datos
            $authModel->insert($authData);

            // Mostrar un mensaje o redireccionar a otra página
            echo "Persona agregada correctamente";
            return redirect()->to('/administrador/usuarios');
        } else {
            // Inserción fallida
            $errors = $personaModel->errors();
            print_r($errors);
        }
    } else {
        // Mostrar el formulario
        return view('administrador/agregar_persona');
    }
}
public function eliminarPersona($id_persona)
{
    // Instancia el modelo de personas
    $personaModel = new PersonaModel();

    // Cargar la base de datos
    $db = \Config\Database::connect();

    // Comienza la transacción
    $db->transBegin();

    try {
        // Verifica si la persona existe antes de intentar eliminarla
        $persona = $personaModel->find($id_persona);

        if ($persona) {
            // Eliminar registros de Autenticacion vinculados a la persona
            $db->table('Autenticacion')->where('persona_id', $id_persona)->delete();

            // Persona encontrada, procede con la eliminación
            $personaModel->delete($id_persona);

            // Confirmar la transacción
            $db->transCommit();

            // Redirecciona o realiza alguna acción después de la eliminación
            return redirect()->to('administrador/usuarios')->with('success', 'Persona y registros relacionados eliminados correctamente.');
        } else {
            // La persona no existe, realiza un rollback
            $db->transRollback();

            // Maneja el caso adecuadamente, puedes redirigir o mostrar un mensaje de error
            return redirect()->to('administrador/usuarios')->with('error', 'La persona no existe o ya fue eliminada.');
        }
    } catch (\Exception $e) {
        // Ocurrió un error, realiza un rollback y maneja la excepción
        $db->transRollback();
        
        // Puedes loguear el error, redirigir o mostrar un mensaje de error
        log_message('error', $e->getMessage());

        return redirect()->to('administrador/usuarios')->with('error', 'Error al intentar eliminar la persona y registros relacionados.');
    }
}
public function guardar_edicion_persona($id_persona)
{
    // Instancia el modelo de personas
    $personaModel = new PersonaModel();
    $autenticacionModel = new AutenticacionModel(); // Asegúrate de tener el modelo de Autenticacion configurado

    // Obtén la información de la persona que deseas editar
    $data['persona'] = $personaModel->find($id_persona);

    // Verifica si la persona existe
    if (!$data['persona']) {
        // La persona no existe, puedes redirigir o mostrar un mensaje de error
        return redirect()->to('administrador/usuarios')->with('error', 'La persona no existe.');
    }
        // Datos de la persona
        $nuevosDatosPersona = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'ci' => $this->request->getPost('ci'),
            'correo' => $this->request->getPost('correo'),
            'telefono' => $this->request->getPost('telefono'),
            'direccion' => $this->request->getPost('direccion'),
            'fecha_nacimiento' => $this->request->getPost('fecha_nacimiento'),
            'tipo_persona' => $this->request->getPost('tipo_persona'),
            'foto' => $this->request->getPost('foto'), // Asegúrate de tener $fotoNombre definido
        ];

        // Datos de autenticación
        $nuevosDatosAutenticacion = [
            'usuario' => $this->request->getPost('usuario'),
            'contrasena' => $this->request->getPost('contrasena'),
            'tipo_persona' => $this->request->getPost('tipo_persona'),
        ];

        // Actualiza la información de la persona
        
        $personaModel->actualizarPersona($id_persona, $nuevosDatosPersona);


        // Actualiza la información de autenticación
        $autenticacionModel->update(['persona_id' => $id_persona], $nuevosDatosAutenticacion);

        // Redirecciona o realiza alguna acción después de la actualización
        return redirect()->to('administrador/usuarios')->with('success', 'Persona y datos de autenticación actualizados correctamente.');
}
public function editar_persona($id_persona)
{
    $personaModel = new PersonaModel();
    $data['persona'] = (object)$personaModel->obtenerPersona($id_persona);
    // Cargar la vista de edición
    return view('administrador/editar_persona', $data);
}


    
}
