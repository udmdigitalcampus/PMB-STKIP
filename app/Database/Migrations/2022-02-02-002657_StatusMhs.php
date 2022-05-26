<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusMhs extends Migration
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
            'nim'       => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'profil_id'       => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('profil_id', 'profil', 'id', '', 'CASCADE');
        $this->forge->createTable('status_mhs', true);
    }

    public function down()
    {
        if ($this->db->DBDriver != 'SQLite3') // @phpstan-ignore-line
        {
        } else {
            $this->forge->dropTable('status_mhs', true);
        }
    }
}