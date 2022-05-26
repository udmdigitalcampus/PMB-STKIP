<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tahun extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tahun'       => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'status'       => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tahun', true);
    }

    public function down()
    {
        if ($this->db->DBDriver != 'SQLite3') // @phpstan-ignore-line
        {
        } else {
            $this->forge->dropTable('tahun', true);
        }
    }
}