<?php

namespace App\Controllers;

use App\Models\AlimentoModel;

class AlimentosController extends BaseController
{
    protected $alimentoModel;

    public function __construct()
    {
        $this->alimentoModel = new AlimentoModel();
    }

    public function index()
    {
        $data['alimentos'] = $this->alimentoModel->findAll();
        return view('alimentos/index', $data);
    }

    public function crear()
    {
        return view('alimentos/crear');
    }

    public function guardar()
    {
        $this->alimentoModel->save($this->request->getPost());
        return redirect()->to('/alimentos');
    }

    public function editar($id)
    {
        $data['alimento'] = $this->alimentoModel->find($id);
        return view('alimentos/editar', $data);
    }

    public function actualizar($id)
    {
        $this->alimentoModel->update($id, $this->request->getPost());
        return redirect()->to('/alimentos');
    }

    public function eliminar($id)
    {
        $this->alimentoModel->delete($id);
        return redirect()->to('/alimentos');
    }
}
