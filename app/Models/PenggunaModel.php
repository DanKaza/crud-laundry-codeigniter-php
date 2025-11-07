<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table           = 'tb_user';
    protected $primaryKey      = 'id_user';
    protected $allowedFields   = [
        "nama_pengguna",
        "username",
        "password",
        "id_outlet",
        "role"
    ];
}