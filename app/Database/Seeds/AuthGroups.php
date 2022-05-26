<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroups extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'superadmin',
                'description'    => 'Manage All Profile'
            ],

            [
                'name' => 'admin',
                'description'    => 'Manage admin profile'
            ],

            [
                'name' => 'mahasiswa',
                'description'    => 'Manage mahasiswa Profile'
            ],

            [
                'name' => 'none',
                'description'    => 'Tidak ada akses'
            ],
        ];

        // Using Query Builder
        $this->db->table('auth_groups')->insertBatch($data);
    }
}