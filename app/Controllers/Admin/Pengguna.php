<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pengguna extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Admin Pengguna | My Laundry",
            'header' => "Data Pengguna",
            'cardtitle' => "Tabel Pengguna",
            'inputtitle' => "Form Input Data Pengguna",
            'updatetitle' => "Form Update Data Pengguna",
            'deletetitle' => "Delete Data Pengguna",
        ];

        $data['page'] = view('admin/v_pengguna', $data);

        echo view("admin/v_homepage", $data);
    }
}