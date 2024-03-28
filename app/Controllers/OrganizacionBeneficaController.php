<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\AlimentoModel;
use App\Models\RecepcionDonacionModel;
use App\Models\EntregaDonacionModel;

class OrganizacionBeneficaController extends BaseController
{
    public function gestionProductos()
    {
        $productoModel = new ProductoModel();
        $productos = $productoModel->findAll();

        $data['productos'] = $productos;
        return view('organizacion_benefica/gestion_productos', $data);
    }

    public function agregarProducto()
    {
        $productoModel = new ProductoModel();

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion')
            // Agregar aquí más campos si es necesario
        ];

        $productoModel->insert($data);

        return redirect()->to(base_url('organizacion_benefica/gestion_productos'));
    }

    public function editarProducto($id)
    {
        $productoModel = new ProductoModel();

        // Obtener detalles del producto por su ID
        $producto = $productoModel->find($id);

        // Mostrar formulario de edición con los detalles del producto
        // Aquí puedes usar la misma vista que el formulario de agregar con los campos ya llenos
    }

    public function actualizarProducto($id)
    {
        $productoModel = new ProductoModel();

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion')
            // Agregar aquí más campos si es necesario
        ];

        $productoModel->update($id, $data);

        return redirect()->to(base_url('organizacion_benefica/gestion_productos'));
    }

    public function eliminarProducto($id)
    {
        $productoModel = new ProductoModel();
        $productoModel->delete($id);

        return redirect()->to(base_url('organizacion_benefica/gestion_productos'));
    }

    public function gestionAlimentos()
    {
        $alimentoModel = new AlimentoModel();
        $alimentos = $alimentoModel->findAll();

        $data['alimentos'] = $alimentos;
        return view('organizacion_benefica/gestion_alimentos', $data);
    }

    public function agregarAlimento()
    {
        $alimentoModel = new AlimentoModel();

        $validation =  \Config\Services::validation();

        if (!$this->validate($alimentoModel->validationRules, $alimentoModel->validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'categoria' => $this->request->getPost('categoria'),
            'fecha_vencimiento' => $this->request->getPost('fecha_vencimiento'),
            'grupo_alimenticio' => $this->request->getPost('grupo_alimenticio')
        ];

        $alimentoModel->insert($data);

        return redirect()->to(base_url('organizacion_benefica/gestion_alimentos'));
    }

    public function editarAlimento($id)
    {
        $alimentoModel = new AlimentoModel();

        $data['alimento'] = $alimentoModel->find($id);
        return view('organizacion_benefica/editar_alimento', $data);
    }

    public function actualizarAlimento($id)
    {
        $alimentoModel = new AlimentoModel();

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'categoria' => $this->request->getPost('categoria'),
            'fecha_vencimiento' => $this->request->getPost('fecha_vencimiento'),
            'grupo_alimenticio' => $this->request->getPost('grupo_alimenticio')
        ];

        $alimentoModel->update($id, $data);

        return redirect()->to(base_url('organizacion_benefica/gestion_alimentos'));
    }

    public function eliminarAlimento($id)
    {
        $alimentoModel = new AlimentoModel();
        $alimentoModel->delete($id);

        return redirect()->to(base_url('organizacion_benefica/gestion_alimentos'));
    }
    public function seguimientoDonaciones()
    {
        // Carga el modelo de recepción de donaciones
        $recepcionDonacionModel = new RecepcionDonacionModel();

        // Recupera todas las donaciones desde la base de datos
        $donaciones = $recepcionDonacionModel->findAll();

        // Verifica si se encontraron donaciones
        if (!empty($donaciones)) {
            $data['donaciones'] = $donaciones;
        } else {
            // Si no se encontraron donaciones, se puede establecer un mensaje de error o redirigir a una página de error
            $data['error'] = "No se encontraron donaciones.";
        }

        // Carga la vista de seguimiento de donaciones y pasa los datos recuperados
        return view('organizacion_benefica/seguimiento_donaciones', $data);
    }


    public function DonacionesPendientes()
    {
        // Carga el modelo de recepción de donaciones
        $recepcionModel = new EntregaDonacionModel();
    
        // Recupera las donaciones pendientes desde la base de datos
        $donacionesPendientes = $recepcionModel->where('estado_entrega', 'PENDIENTE')->findAll();
    
        // Pasa los datos recuperados a la vista
        $data['donacionesPendientes'] = $donacionesPendientes;
    
        // Carga la vista de panel de donaciones pendientes y pasa los datos
        return view('organizacion_benefica/donaciones_pendientes', $data);
    }
    
    
}
