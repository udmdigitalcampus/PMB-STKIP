<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Tahun extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tahun' => "2022/2023",
                'status'    => 1
            ],
            [
                'tahun' => "2023/2024",
                'status'    => 0
            ],
            [
                'tahun' => "2024/2025",
                'status'    => 0
            ],
        ];

        // Using Query Builder
        $this->db->table('tahun')->insertBatch($data);
    }
}