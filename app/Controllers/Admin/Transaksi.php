<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;
use App\Models\OutletModel;
use App\Models\PelangganModel;
use App\Models\PaketModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{

    protected $pengguna;
    protected $outlet;
    protected $pelanggan;
    protected $paket;
    protected $transaksi;

    public function __construct()
    {
        $this->pengguna = new PenggunaModel();
        $this->outlet = new OutletModel();
        $this->pelanggan = new PelangganModel();
        $this->paket = new PaketModel();
        $this->transaksi = new TransaksiModel();

        if(session()->get('role') != "Admin" ) {
            echo '<script>
            alert("Access Denied!");
            </script>';
            exit();
        }
    }
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

        $data['pengguna'] = $this->pengguna->getPengguna()->getResult();
        $data['outlet'] = $this->outlet->getOutlet()->getResult();
        $data['pelanggan'] = $this->pelanggan->getPelanggan()->getResult();
        $data['paket'] = $this->paket->getPaket()->getResult();

        $data['transaksi'] = $this->transaksi->getTransaksiByAllId()->getResult();
        $data['transaksicount'] = $this->transaksi->countAllResults();
        
        $data['page'] = view('admin/v_transaksi', $data);

        echo view("admin/v_homepage", $data);
    }

    public function autocode()
    {
        return json_encode($this->transaksi->generateCode());
    }

    public function save()
    {
        $data = array(
            "id_outlet" => session()->get('id_outlet'),
            "kode_invoice" => $this->request->getPost('kode_invoice'),
            "id_member" => $this->request->getPost('id_member'),
            "tgl_transaksi" => $this->request->getPost('tgl_transaksi'),
            "batas_waktu" => $this->request->getPost('batas_waktu'),
            "tgl_bayar" => $this->request->getPost('tgl_bayar'),
            "biaya_tambahan" => $this->request->getPost('biaya_tambahan'),
            "diskon" => $this->request->getPost('diskon'),
            "pajak" => $this->request->getPost('pajak'),
            "status_transaksi" => $this->request->getPost('status_transaksi'),
            "status_bayar" => $this->request->getPost('status_bayar'),
            "id_user" => session()->get('id_user'),
            "id_paket" => $this->request->getPost('id_paket'),
            "qty" => $this->request->getPost('qty'),
            "keterangan" => $this->request->getPost('keterangan'),
        );

        $this->transaksi->saveTransaksi($data);
        session()->setFlashdata('title', 'Great');
        return redirect()->back()
            ->with('text', 'New data transaksi was saved');
    }
    public function update()
    {
        $id = $this->request->getPost('id_transaksi');

        $data = array(
            'kode_invoice' => $this->request->getPost('kode_invoice'),
            'id_member' => $this->request->getPost('id_member'),
            'tgl_bayar' => $this->request->getPost('tgl_bayar'),
            'status_transaksi' => $this->request->getPost('status_transaksi'),
            'status_bayar' => $this->request->getPost('status_bayar'),
        );
        $this->transaksi->updateTransaksi($data, $id);
        session()->setFlashdata('title', 'Great');
        return redirect()->back()
            ->with('text', 'Data transaksi was updated');
    }
    public function delete()
    {
        $id = $this->request->getPost('id_transaksi');

        $this->transaksi->deleteTransaksi($id);
        session()->setFlashdata('title', 'Great');
        return redirect()->back()
            ->with('text', 'Data transaksi was deleted');
    }
}
