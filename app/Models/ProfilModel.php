<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = 'profil';
    protected $primaryKey = 'id';
    protected $returnType = ProfilModel::class;
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['jurusan', 'nik', 'nisn', 'npsn', 'nama_lengkap', 'tempat_lahir', 'sekolah_asal', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'agama', 'jurusan_sekolah_asal', 'tahun_lulus', 'nama_ayah', 'nama_ibu', 'kk', 'ktp', 'akta', 'izazah', 'foto_profil', 'ktp_ayah', 'ktp_ibu', 'no_hp', 'user_id', 'tahun', 'dari'];
}