<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table           = 'tb_paket';
    protected $primaryKey      = 'id_paket';
    protected $allowedFields   = [
        "id_outlet",
        "jenis_paket",
        "nama_paket",
        "harga"
    ];
}
