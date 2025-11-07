<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OutletModel;

class Outlet extends BaseController
{
    function __construct()
    {
        $this->outlet = new OutletModel();
    }

    public function index()
    {
        $data = [
            'title' => "Admin Outlet | My Laundry",
            'header' => "Data Outlet",
            'cardtitle' => "Tabel Outlet",
            'inputtitle' => "Form Input Data Outlet",
            'updatetitle' => "Form Update Data Outlet",
            'deletetitle' => "Delete Data Outlet",
        ];

        $data['page'] = view('admin/v_outlet', $data);

        echo view("admin/v_homepage", $data);
    }


    public function save()
    {
        $data = array(
            'nama_outlet' => $this->request->getPost('nama_outlet'),
            'alamat_outlet' => $this->request->getPost('alamat_outlet'),
            'no_tlp' => $this->request->getPost('no_tlp'),
        );
        $this->outlet->saveOutlet($data);
        session()->setFlashdata('title', 'greate!');
        return redirect()->back() 
        ->with('text', 'New Data Outlet was saved!.');
    }
}