<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpleadoModel extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    protected $allowedFields = ['nombre', 'fecha_nacimiento', 'direccion', 'telefono'];
}