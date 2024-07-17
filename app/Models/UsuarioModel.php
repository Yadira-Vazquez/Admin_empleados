<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['usuario', 'password'];

    public function buscarUsuario($usuario)
    {
        return $this->where('usuario', $usuario)->first();
    }
}