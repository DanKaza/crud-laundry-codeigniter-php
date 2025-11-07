<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Transaksi extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Admin Transaksi | My Laundry",
            'header' => "Data Transaksi",
            'cardtitle' => "Tabel Transaksi",
            'cardtitlestat' => "Tabel Status Transaksi",
            'inputtitle' => "Form Input Data Transaksi",
            'updatetitle' => "Form Update Data Transaksi",
            'deletetitle' => "Delete Data Transaksi",
        ];

        $data['page'] = view('admin/v_transaksi', $data);

        echo view("admin/v_homepage", $data);
    }
}