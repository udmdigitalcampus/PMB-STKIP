<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengumuman extends Migration
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
            'judul'       => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
            ],
            'isi'       => [
                'type'       => 'TEXT',
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pengumuman', true);
    }

    public function down()
    {
        if ($this->db->DBDriver != 'SQLite3') // @phpstan-ignore-line
        {
        } else {
            $this->forge->dropTable('pengumuman', true);
        }
    }
}