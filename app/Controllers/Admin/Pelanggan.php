<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pelanggan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Admin Pelanggan | My Laundry",
            'header' => "Data Pelanggan",
            'cardtitle' => "Tabel Pelanggan",
            'inputtitle' => "Form Input Data Pelanggan",
            'updatetitle' => "Form Update Data Pelanggan",
            'deletetitle' => "Delete Data Pelanggan",
        ];

        $data['page'] = view('admin/v_pelanggan', $data);

        echo view("admin/v_homepage", $data);
    }
}