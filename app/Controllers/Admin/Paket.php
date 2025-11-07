<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Paket extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Admin Paket | My Laundry",
            'header' => "Data Paket",
            'cardtitle' => "Tabel Paket",
            'inputtitle' => "Form Input Data Paket",
            'updatetitle' => "Form Update Data Paket",
            'deletetitle' => "Delete Data Paket",
        ];

        $data['page'] = view('admin/v_paket', $data);

        echo view("admin/v_homepage", $data);
    }
}