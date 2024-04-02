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

}
