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

    public function savePengguna($data)
    {
        return $this->insert($data);
    }

    public function getPengguna()
    {
        $builder = $this->db->table('tb_user');
        $builder->select('*');
        $builder->join('tb_outlet', 'tb_outlet.id_outlet = tb_user.id_outlet', 'left');
        return $builder->get();
    }

    public function updatePengguna($data, $id)
    {
        $query = $this->db->table('tb_user')->update($data, array('id_user' => $id));


    }

    public function deletePengguna($id)
    {
        $query = $this->db->table('tb_user')->delete(array('id_user' => $id));
        return $query;

    }

}
