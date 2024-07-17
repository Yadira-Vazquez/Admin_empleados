<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmpleadosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
           'id_empleado' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'fecha_nacimiento' => [
                'type' => 'DATE',
            ],
            'direccion' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'telefono' => [
                'type' => 'VARCHAR',
                'constraint' => 20, 
            ],
        ]);
        $this->forge->addPrimaryKey('id_empleado');
        $this->forge->createTable('empleados');
    }

    public function down()
    {
        $this->forge->dropTable('empleados');
    }
}