<?php

namespace App\Controllers;

use App\Models\VoluntarioModel;

class VoluntarioController extends BaseController
{
    public function dashboard()
    {
        
        return view('voluntario/dashboard');
    }

}
