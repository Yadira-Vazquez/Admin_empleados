<?php

namespace App\Controllers;
use App\Models\UsuarioModel;

class Home extends BaseController
{
    public function index()
    {
        $mensajeError = session()->getFlashdata('error');
        $mensaje = session('mensaje');

        return view('login', [
            'mensajeError' => $mensajeError,
            'mensaje' => $mensaje
        ]);
    }

    public function login()
    {
        try {
            $usuariosModel = new UsuarioModel();

            $usuario = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $usuarioBD = $usuariosModel->buscarUsuario($usuario);  

            if ($usuarioBD) {
                if (password_verify($password, $usuarioBD['password'])) {
                    $data = [
                        'usuario_id' => $usuarioBD['id_usuario'],
                        'usuario_nombre' => $usuarioBD['usuario'],
                        'isLoggedIn' => true
                    ];
                    session()->set($data);
                    log_message('info', 'Datos de la sesión: ' . print_r(session()->get(), true));

                    return redirect()->to('/inicio');
                } else {
                    return redirect()->to('/')->with('mensaje', 'Contraseña incorrecta.');
                }
            } else {
                return redirect()->to('/')->with('mensaje', 'El usuario no existe.');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return redirect()->to('/')->with('mensaje', 'Error interno. Por favor, intente de nuevo más tarde.');
        }
    }

    public function salir()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
