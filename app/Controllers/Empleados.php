<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmpleadoModel;

class Empleados extends BaseController
{
    public function index()
    {
        $empleadoModel = new EmpleadoModel();
        $data['empleados'] = $empleadoModel->findAll();

        return view('inicio', $data);
    }
  

    public function agregar()
    {
        $empleadoModel = new EmpleadoModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'fecha_nacimiento' => $this->request->getPost('fecha_nacimiento'),
            'direccion' => $this->request->getPost('direccion'),
            'telefono' => $this->request->getPost('telefono')
        ];

        $empleadoModel->save($data);

        return redirect()->to('/inicio');
    }

    public function eliminar($id)
    {
        $empleadoModel = new EmpleadoModel();
        $empleadoModel->delete($id);

        return redirect()->to('/inicio');
    }

    public function actualizar($id)
    {
        $empleadoModel = new EmpleadoModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'fecha_nacimiento' => $this->request->getPost('fecha_nacimiento'),
            'direccion' => $this->request->getPost('direccion'),
            'telefono' => $this->request->getPost('telefono')
        ];

        $empleadoModel->update($id, $data);

        return redirect()->to('/inicio');
    }
}
