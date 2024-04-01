<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class ProductosController extends BaseController
{
    protected $productoModel;

    public function __construct()
    {
        $this->productoModel = new ProductoModel();
    }

    public function index()
    {
        $data['productos'] = $this->productoModel->findAll();
        return view('productos/productos', $data);
    }
    

    public function crear()
    {
        return view('productos/productos/crear');
    }

    public function guardar()
    {
        $this->productoModel->save($this->request->getPost());
        return redirect()->to('productos/productos');
    }

    public function editar($id)
    {
        $data['producto'] = $this->productoModel->find($id);
        return view('productos/productos/editar', $data);
    }

    public function actualizar($id)
    {
        $this->productoModel->update($id, $this->request->getPost());
        return redirect()->to('producto/productos');
    }

    public function eliminar($id)
    {
        $this->productoModel->delete($id);
        return redirect()->to('productos/productos');
    }
}
