<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table           = 'tb_member';
    protected $primaryKey      = 'id_member';
    protected $allowedFields   = [
        "nama_pelanggan",
        "alamat_pelanggan",
        "jenis_kelamin",
        "no_tlp"
    ];
}