<?php

namespace App\Controllers;

use App\Models\EntregaDonacionModel;
use CodeIgniter\Controller;

class DonanteController extends BaseController
{
    public function formularioDonacion()
    {
        // Cargar el helper 'form'
        helper('form');

        // Aquí se muestra el formulario de donación
        return view('donante/formulario_donacion');
    }

    public function registrarEntrega1()
    {
        // Verificar si la solicitud es de tipo POST
        if ($this->request->getMethod() === 'post') {
            // Validar los datos del formulario (puedes utilizar la librería de validación de CodeIgniter)
            $validation = \Config\Services::validation();
            $validation->setRules([
                'fecha_entrega' => 'required|valid_date',
                'cantidad_entregada' => 'required|integer',
                'observacion' => 'max_length[255]',
                'responsable_entrega_id' => 'required|integer',
                'responsable_recepcion_entrega_id' => 'required|integer',
                'org_receptora_id' => 'required|integer',
                'estado_entrega' => 'required|in_list[PENDIENTE,COMPLETADA]',
            ]);

            if ($validation->withRequest($this->request)->run()) {
                // Si los datos del formulario son válidos, procesarlos y guardar en la base de datos
                $entregaModel = new EntregaDonacionModel();
                $data = [
                    'fecha_entrega' => $this->request->getPost('fecha_entrega'),
                    'cantidad_entregada' => $this->request->getPost('cantidad_entregada'),
                    'observacion' => $this->request->getPost('observacion'),
                    'responsable_entrega_id' => $this->request->getPost('responsable_entrega_id'),
                    'responsable_recepcion_entrega_id' => $this->request->getPost('responsable_recepcion_entrega_id'),
                    'org_receptora_id' => $this->request->getPost('org_receptora_id'),
                    'estado_entrega' => $this->request->getPost('estado_entrega'),
                ];

                $entregaModel->insert($data);

                // Luego redirigir o mostrar un mensaje de éxito
                return redirect()->to(site_url('donante/formulario_donacion'))->with('success', 'Entrega registrada exitosamente.');
            } else {
                // Si los datos del formulario no son válidos, mostrar de nuevo el formulario con los errores
                return view('donante/formulario_donacion', ['validation' => $validation]);
            }
        } else {
            // Si la solicitud no es de tipo POST, redirigir al formulario de donación
            return redirect()->to(site_url('donante/formulario_donacion'));
        }
    }
    public function registrarEntrega()
    {
        // Verificar si la solicitud es de tipo POST
        if ($this->request->getMethod() === 'post') {
            // Validar los datos del formulario (puedes utilizar la librería de validación de CodeIgniter)
            $validation = \Config\Services::validation();
            $validation->setRules([
                'fecha_entrega' => 'required|valid_date',
                'cantidad_entregada' => 'required|integer',
                'observacion' => 'max_length[255]',
                'responsable_entrega_id' => 'required|integer',
                'responsable_recepcion_entrega_id' => 'required|integer',
                'org_receptora_id' => 'required|integer',
                'estado_entrega' => 'required|in_list[PENDIENTE,COMPLETADA]',
            ]);

            if ($validation->withRequest($this->request)->run()) {
                // Si los datos del formulario son válidos, procesarlos y guardar en la base de datos
                $entregaModel = new EntregaDonacionModel();
                $data = [
                    'fecha_entrega' => $this->request->getPost('fecha_entrega'),
                    'cantidad_entregada' => $this->request->getPost('cantidad_entregada'),
                    'observacion' => $this->request->getPost('observacion'),
                    'responsable_entrega_id' => $this->request->getPost('responsable_entrega_id'),
                    'responsable_recepcion_entrega_id' => $this->request->getPost('responsable_recepcion_entrega_id'),
                    'org_receptora_id' => $this->request->getPost('org_receptora_id'),
                    'estado_entrega' => $this->request->getPost('estado_entrega'),
                ];

                $entregaModel->insert($data);

                // Luego redirigir o mostrar un mensaje de éxito
                return redirect()->to(site_url('donante/formulario_donacion'))->with('success', 'Entrega registrada exitosamente.');
            } else {
                // Si los datos del formulario no son válidos, mostrar de nuevo el formulario con los errores
                return view('donante/formulario_donacion', ['validation' => $validation]);
            }
        } else {
            // Si la solicitud no es de tipo POST, redirigir al formulario de donación
            return redirect()->to(site_url('donante/formulario_donacion'));
        }
    }
}
