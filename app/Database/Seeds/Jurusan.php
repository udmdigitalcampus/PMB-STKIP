<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Jurusan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jurusan_id' => 88201,
                'jurusan'    => "Pendidikan Bahasa dan Sastra Indonesia",
            ],
            [
                'jurusan_id' => 86206,
                'jurusan'    => "Pendidikan Guru Sekolah Dasar",
            ],
            [
                'jurusan_id' => 85201,
                'jurusan'    => "Pendidikan Jasmani, Olahraga, Kesehatan dan Rekreasi",
            ],

        ];

        // Using Query Builder
        $this->db->table('jurusan')->insertBatch($data);
    }
}