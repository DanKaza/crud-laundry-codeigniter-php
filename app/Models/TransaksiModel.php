<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table           = 'tb_transaksi';
    protected $primaryKey      = 'id_transaksi';
    protected $allowedFields   = [
        "id_outlet",
        "kode_invoice",
        "id_member",
        "tgl_transaksi",
        "batas_waktu",
        "tgl_bayar",
        "biaya_tambahan",
        "diskon",
        "pajak",
        "status_transaksi",
        "status_bayar",
        "id_user",
        "id_paket",
        "qty",
        "keterangan	",
    ];
}