<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusMhsModel extends Model
{
    protected $table = 'status_mhs';
    protected $primaryKey = 'id';
    protected $returnType = StatusMhsModel::class;
    protected $allowedFields = ['nim', 'profil_id'];
}