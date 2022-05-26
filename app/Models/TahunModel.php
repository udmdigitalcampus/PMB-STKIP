<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunModel extends Model
{
    protected $table = 'tahun';
    protected $primaryKey = 'id';
    protected $returnType = TahunModel::class;
    protected $allowedFields = ['tahun', 'status'];

    public function gettahunaktif()
    {
        return $this->where('status', 1)->get()->getRow()->tahun;
    }
}