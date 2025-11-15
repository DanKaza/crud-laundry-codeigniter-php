<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OutletModel;
use App\Models\PenggunaModel;

class Pengguna extends BaseController
{
    // jangan lupa proteksi variabel model
    protected $outlet;
    protected $pengguna;
    function __construct()
        {
             $this->outlet = new OutletModel();
            $this->pengguna = new PenggunaModel();

            
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
            'title' => "Admin Pengguna | My Laundry",
            'header' => "Data Pengguna",
            'cardtitle' => "Tabel Pengguna",
            'inputtitle' => "Form Input Data Pengguna",
            'updatetitle' => "Form Update Data Pengguna",
            'deletetitle' => "Delete Data Pengguna",
        ];

         $data['outlet'] = $this->outlet->getOutlet()->getResult();

         $data['pengguna'] = $this->pengguna->getPengguna()->getResult();

         $data['penggunacount'] = $this->pengguna->countAllResults();


        $data['page'] = view('admin/v_pengguna', $data);

        echo view("admin/v_homepage", $data);
    }

    public function save()
    {
        $data = array(
            'nama_pengguna' => $this->request->getPost('nama_pengguna'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'id_outlet' => $this->request->getPost('id_outlet'),
            'role' => $this->request->getPost('role'),

        );
        $this->pengguna->savePengguna($data);
        session()->setFlashdata('title', 'Great!');
        return redirect()->back()
        ->with('text','New Data Pengguna was Saved!');

     
    }

    public function update()
    {
        $id = $this->request->getPost('id_user');
        $data = array(
            'nama_pengguna' => $this->request->getPost('nama_pengguna'),
            'username' => $this->request->getVar('username'),
            'id_outlet' => $this->request->getPost('id_outlet'),
            'role' => $this->request->getPost('role'),

        );

        $this->pengguna->updatePengguna($data, $id);
        session()->setFlashdata('title', 'Updated!');
        return redirect()->back()
        ->with('text','Data Pengguna was Updated!');


    }

    public function delete()
    {
        $id = $this->request->getPost('id_user');

        $this->pengguna->deletePengguna($id);
        session()->setFlashdata('title', 'Great!');
        return redirect()->back()
        ->with('text','Data Pengguna was Deleted!');
    }

}