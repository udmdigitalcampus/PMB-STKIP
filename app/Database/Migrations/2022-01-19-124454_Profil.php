<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profil extends Migration
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
            'jurusan'       => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nisn' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'npsn' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'agama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'sekolah_asal' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'jurusan_sekolah_asal' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tahun_lulus' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'nama_ayah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nama_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'foto_profil' => [
                'type' => 'TEXT',
            ],
            'ktp' => [
                'type' => 'TEXT',
            ],
            'kk' => [
                'type' => 'TEXT',
            ],
            'akta' => [
                'type' => 'TEXT',
            ],
            'izazah' => [
                'type' => 'TEXT',
            ],
            'ktp_ayah' => [
                'type' => 'TEXT',
            ],
            'ktp_ibu' => [
                'type' => 'TEXT',
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'tahun' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'dari' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('profil', true);
    }

    public function down()
    {
        if ($this->db->DBDriver != 'SQLite3') // @phpstan-ignore-line
        {
        }
        $this->forge->dropTable('profil', true);
    }
}