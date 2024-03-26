<?php

namespace App\Controllers;

use App\Models\PersonaModel;

class HomeController extends BaseController
{
    public function index()
    {
        $personaModel = new PersonaModel();
        $data['personas'] = $personaModel->findAll();
        return view('home/index', $data);
    }
    public function base()
    {
        return view('home/base');
    }
    public function inicio()
    {
        return view('home/inicio');
    }
    public function quienes_somos()
    {
        return view('home/quienes_somos');
    }
    public function donaciones()
    {
        return view('home/donaciones');
    }
    public function contacto()
    {
        return view('home/contacto');
    }
    public function preguntas()
    {
        return view('home/preguntas');
    }
}

