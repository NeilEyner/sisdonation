<?php

namespace App\Controllers;

helper('form');

use CodeIgniter\Controller;
use App\Models\PersonaModel;
use App\Models\AutenticacionModel;
use App\Models\OrganizacionModel;
use App\Models\ProductoModel;
use App\Models\AlimentoModel;


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

    public function mostrarProductos1()
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

            $personaModel = new PersonaModel();

            if ($personaModel->agregarPersona($personaData)) {
                $personaId = $personaModel->getInsertID();
                $contrasena = $this->request->getPost('contrasena');
                $authModel = new AutenticacionModel();
                $authData = [
                    'usuario' => $usuario,
                    'contrasena' => $contrasena,
                    'persona_id' => $personaId,
                    'tipo_persona' => $tipoPersona,
                ];
                $authModel->insert($authData);
                echo "Persona agregada correctamente";
                return redirect()->to('/administrador/usuarios');
            } else {
                $errors = $personaModel->errors();
                print_r($errors);
            }
        } else {
            return view('administrador/agregar_persona');
        }
    }
    public function eliminarPersona($id_persona)
    {
        $personaModel = new PersonaModel();
        $db = \Config\Database::connect();
        $db->transBegin();

        try {
            $persona = $personaModel->find($id_persona);

            if ($persona) {
                $db->table('Autenticacion')->where('persona_id', $id_persona)->delete();
                $personaModel->delete($id_persona);
                $db->transCommit();
                return redirect()->to('administrador/usuarios')->with('success', 'Persona y registros relacionados eliminados correctamente.');
            } else {
                $db->transRollback();
                return redirect()->to('administrador/usuarios')->with('error', 'La persona no existe o ya fue eliminada.');
            }
        } catch (\Exception $e) {

            $db->transRollback();
            log_message('error', $e->getMessage());
            return redirect()->to('administrador/usuarios')->with('error', 'Error al intentar eliminar la persona y registros relacionados.');
        }
    }
    public function guardar_edicion_persona($id_persona)
    {
        $personaModel = new PersonaModel();
        $autenticacionModel = new AutenticacionModel();

        $data['persona'] = $personaModel->find($id_persona);

        if (!$data['persona']) {

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
            'foto' => $this->request->getPost('foto'),
        ];

        // Datos de autenticación
        $nuevosDatosAutenticacion = [
            'usuario' => $this->request->getPost('usuario'),
            'contrasena' => $this->request->getPost('contrasena'),
            'tipo_persona' => $this->request->getPost('tipo_persona'),
        ];


        $personaModel->actualizarPersona($id_persona, $nuevosDatosPersona);

        $autenticacionModel->update(['persona_id' => $id_persona], $nuevosDatosAutenticacion);

        return redirect()->to('administrador/usuarios')->with('success', 'Persona y datos de autenticación actualizados correctamente.');
    }

    public function editar_persona($id_persona)
    {
        $personaModel = new PersonaModel();
        $personaData = (object)$personaModel->obtenerPersona($id_persona);

        $autenticacionModel = new AutenticacionModel();
        $credencialesData = (object)$autenticacionModel->obtener_credenciales_por_id_persona($id_persona);

        // Combinar los datos de las dos consultas en un solo array
        $data = [
            'persona' => $personaData,
            'credenciales' => $credencialesData
        ];

        return view('administrador/editar_persona', $data);
    }

    // de aqui organizacion
    public function agregarOrganizacion()
    {
        if ($this->request->getMethod() === 'post') {
            $nombre = $this->request->getPost('nombre_org');
            $descripcion = $this->request->getPost('descripcion');
            $tipoOrganizacion = $this->request->getPost('tipo_organizacion');
            $paginaWeb = $this->request->getPost('pagina_web');
            $ubicacion = $this->request->getPost('ubicacion');
            $personaContacto = $this->request->getPost('persona_contacto');
            $telefonoContacto = $this->request->getPost('telefono_contacto');
            $emailContacto = $this->request->getPost('email_contacto');

            // Construir el array de datos para la organización
            $organizacionData = [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'tipo_organizacion' => $tipoOrganizacion,
                'pagina_web' => $paginaWeb,
                'ubicacion' => $ubicacion,
                'persona_contacto' => $personaContacto,
                'telefono_contacto' => $telefonoContacto,
                'email_contacto' => $emailContacto,
            ];
            if ($tipoOrganizacion == 'ORG_BENEFICA') {
                $tipoOrganizacion = 'ORGANIZACION_BENEFICA';
            } else {
                $tipoOrganizacion = 'ORGANIZACION_RECEPTORA';
            }

            // Instanciar el modelo
            $organizacionModel = new OrganizacionModel();

            // Realizar la inserción a través del método del modelo
            if ($organizacionModel->agregarOrganizacion($organizacionData)) {
                // Obtener el ID de la organización recién insertada
                $organizacionId = $organizacionModel->getInsertID();

                // Obtener el usuario y la contraseña del formulario
                $usuario = $this->request->getPost('usuario');
                $contrasena = $this->request->getPost('contrasena');

                // Instanciar el modelo de autenticación
                $authModel = new AutenticacionModel();

                // Construir el array de datos para la autenticación
                $authData = [
                    'usuario' => $usuario,
                    'contrasena' => $contrasena,
                    'organizacion_id' => $organizacionId,
                    'tipo_persona' => $tipoOrganizacion,
                ];

                // Insertar datos de autenticación en la base de datos
                $authModel->insert($authData);

                // Mostrar un mensaje o redireccionar a otra página
                echo "Organización agregada correctamente";
                return redirect()->to('/administrador/usuarios');
            } else {
                // Inserción fallida
                $errors = $organizacionModel->errors();
                print_r($errors);
            }
        } else {
            // Mostrar el formulario
            return view('administrador/agregar_organizacion');
        }
    }

    public function eliminarOrganizacion($id_organizacion)
    {
        // Instancia el modelo de organizaciones
        $organizacionModel = new OrganizacionModel();

        // Cargar la base de datos
        $db = \Config\Database::connect();

        // Comienza la transacción
        $db->transBegin();

        try {
            // Verifica si la organización existe antes de intentar eliminarla
            $organizacion = $organizacionModel->find($id_organizacion);

            if ($organizacion) {
                // Eliminar registros de Autenticacion vinculados a la organización
                $db->table('Autenticacion')->where('organizacion_id', $id_organizacion)->delete();

                // Organización encontrada, procede con la eliminación
                $organizacionModel->delete($id_organizacion);

                // Confirmar la transacción
                $db->transCommit();

                // Redirecciona o realiza alguna acción después de la eliminación
                return redirect()->to('administrador/usuarios')->with('success', 'Organización y registros relacionados eliminados correctamente.');
            } else {
                // La organización no existe, realiza un rollback
                $db->transRollback();

                // Maneja el caso adecuadamente, puedes redirigir o mostrar un mensaje de error
                return redirect()->to('administrador/usuarios')->with('error', 'La organización no existe o ya fue eliminada.');
            }
        } catch (\Exception $e) {
            // Ocurrió un error, realiza un rollback y maneja la excepción
            $db->transRollback();

            // Puedes loguear el error, redirigir o mostrar un mensaje de error
            log_message('error', $e->getMessage());

            return redirect()->to('administrador/ousuarios')->with('error', 'Error al intentar eliminar la organización y registros relacionados.');
        }
    }

    public function guardar_edicion_organizacion($id_organizacion)
    {
        $organizacionModel = new OrganizacionModel();
        $autenticacionModel = new AutenticacionModel();

        $data['organizacion'] = $organizacionModel->find($id_organizacion);

        if (!$data['organizacion']) {
            return redirect()->to('administrador/usuarios')->with('error', 'La organización no existe.');
        }
        $nuevosDatosOrganizacion = [
            'nombre' => $this->request->getPost('nombre_org'),
            'descripcion' => $this->request->getPost('descripcion'),
            'tipo_organizacion' => $this->request->getPost('tipo_organizacion'),
            'pagina_web' => $this->request->getPost('pagina_web'),
            'ubicacion' => $this->request->getPost('ubicacion'),
            'persona_contacto' => $this->request->getPost('persona_contacto'),
            'telefono_contacto' => $this->request->getPost('telefono_contacto'),
            'email_contacto' => $this->request->getPost('email_contacto'),
        ];
        $nuevosDatosAutenticacion = [
            'usuario' => $this->request->getPost('usuario'),
            'contrasena' => $this->request->getPost('contrasena'),
            'tipo_persona' => 'ORGANIZACION',
        ];

        $organizacionModel->actualizarOrganizacion($id_organizacion, $nuevosDatosOrganizacion);

        $autenticacionModel->update(['organizacion_id' => $id_organizacion], $nuevosDatosAutenticacion);

        return redirect()->to('administrador/usuarios')->with('success', 'Organización y datos de autenticación actualizados correctamente.');
    }

    public function editar_organizacion($id_organizacion)
    {
        $organizacionModel = new OrganizacionModel();
        $organizacionData = (object) $organizacionModel->obtenerOrganizacion($id_organizacion);

        $autenticacionModel = new AutenticacionModel();
        $credencialesData = (object)$autenticacionModel->obtener_credenciales_por_id_org($id_organizacion);

        // Combinar los datos de las dos consultas en un solo array
        $data = [
            'organizacion' => $organizacionData,
            'credenciales' => $credencialesData
        ];

        return view('administrador/editar_organizacion', $data);
    }
    public function mostrarProductos()
    {
        $productoModel = new ProductoModel();
        $data['productos'] = $productoModel->findAll();
        return view('administrador/mostrarProductos', $data);
    }

    public function agregarProducto()
    {
        if ($this->request->getMethod() === 'post') {
            $productoModel = new ProductoModel();
            $productoModel->save($this->request->getPost());
            return redirect()->to('/administrador/productos');
        } else {
            return view('administrador/agregarProducto');
        }
    }

    public function editarProducto($id)
    {
        $productoModel = new ProductoModel();
        $data['producto'] = $productoModel->find($id);
        return view('administrador/editarProducto', $data);
    }

    public function guardarEdicionProducto($id)
    {
        $productoModel = new ProductoModel();
        $productoModel->update($id, $this->request->getPost());
        return redirect()->to('/administrador/mostrarProductos');
    }

    public function eliminarProducto($id)
    {
        $productoModel = new ProductoModel();
        $productoModel->delete($id);
        return redirect()->to('/administrador/mostrarProductos');
    }

    // Funciones para alimentos

    public function mostrarAlimentos()
    {
        $alimentoModel = new AlimentoModel();
        $data['alimentos'] = $alimentoModel->findAll();
        return view('administrador/mostrarAlimentos', $data);
    }

    public function agregarAlimento()
    {
        if ($this->request->getMethod() === 'post') {
            $alimentoModel = new AlimentoModel();
            $alimentoModel->save($this->request->getPost());
            return redirect()->to('/administrador/alimentos');
        } else {
            return view('administrador/agregarAlimento');
        }
    }

    public function editarAlimento($id)
    {
        $alimentoModel = new AlimentoModel();
        $data['alimento'] = $alimentoModel->find($id);
        return view('administrador/editarAlimento', $data);
    }

    public function guardarEdicionAlimento($id)
    {
        $alimentoModel = new AlimentoModel();
        $alimentoModel->update($id, $this->request->getPost());
        return redirect()->to('/administrador/mostrarAlimentos');
    }

    public function eliminarAlimento($id)
    {
        $alimentoModel = new AlimentoModel();
        $alimentoModel->delete($id);
        return redirect()->to('/administrador/mostrarAlimentos');
    }
}
