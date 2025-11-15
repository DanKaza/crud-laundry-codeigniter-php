<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OutletModel ;
use App\Models\PaketModel;

class Paket extends BaseController
{
    protected $paket;
    protected $outlet;

    function __construct()
    {
        $this->paket = new PaketModel();   
        $this->outlet = new OutletModel();

        
        if(session()->get('role') != 'Admin'){
            echo '<script>
            alert("Access Denied");
            </script>';
            exit;
        
        }
    }
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

        $data['outlet'] = $this->outlet->getOutlet()->getResult();

        $data['paket'] = $this->paket->getOutlet()->getResult();

        $data['paketcount'] = $this->paket->countAllResults();

        $data['page'] = view('admin/v_paket', $data);

        echo view("admin/v_homepage", $data);
    }

    public function save()
    {
        $data = array(
            'id_outlet'    => $this->request->getPost('id_outlet'),
            'jenis_paket'  => $this->request->getPost('jenis_paket'),
            'nama_paket'   => $this->request->getPost('nama_paket'),
            'harga'        => $this->request->getPost('harga'),
        );

        $this->paket->savePaket($data);
        session()->setFlashdata('title', 'Great');
        return redirect()->back()
        ->with('text', 'New Data Paket was saved.');


    }


    public function update()
    {   
       $id = $this->request->getPost('id_paket');  
       $data = array(
            'id_outlet'     => $this->request->getPost('id_outlet'),
            'jenis_paket'  => $this->request->getPost('jenis_paket'),
            'nama_paket'   => $this->request->getPost('nama_paket'),
            'harga'        => $this->request->getPost('harga'),
        );

        $this->paket->updatePaket($data, $id);
        session()->setFlashdata('title', 'Updated');
        return redirect()->back()
        ->with('text', 'Data Paket was updated.');
    }

    public function delete()
    {
        $id = $this->request->getPost('id_paket');

        $this->paket->deletePaket($id);
        session()->setFlashdata('title', 'Great!');
        return redirect()->back()
        ->with('text','New Data Paket was Deleted.');
    }
}