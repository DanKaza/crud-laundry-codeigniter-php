<?php

namespace App\Models;

use CodeIgniter\Model;

class OutletModel extends Model
{
    protected $table           = 'tb_outlet';
    protected $primaryKey      = 'id_outlet ';
    protected $allowedFields   = [
        "nama_outlet",
        "alamat_outlet",
        "no_tlp",
    ];

    public function saveOutlet($data)
    {
        $query = $this->db->table('tb_outlet')->insert($data);
        return $query;
    }
}