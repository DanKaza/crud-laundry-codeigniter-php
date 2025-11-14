<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\PenggunaModel;

class Auth extends BaseController
{

    
    protected $pengguna;
    

    function __construct()
    {
        $this->pengguna = new PenggunaModel();
    }


    public function index()
    {

          if ($this->request->is('post')) {
            $rules = [
                'username' => 'required|min_length[5]|max_length[50]',
                'password' => 'required|min_length[5]|max_length[255]|validateUser[username,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Username atau Password tidak sesuai',
                ],
            ];

            if(!$this->validate($rules, $errors)){

                return view('v_login_auth', [ 
                    'validation' => $this->validator,

                ]);
            
            } else {
                $username = $this->request->getVar('username');
                $user = $this->pengguna->where('username', $username)->first();

                // stroing session values
                $this->setUserSession($user);

                //redirecting to dashboard after login
                if($user['role'] == 'Admin'){
                    return redirect()->to('/admin/dashboard');
                } else if($user['role'] == 'Kasir'){
                    return redirect()->to('/kasir/dashboard');
                } else if($user['role'] == 'Owner'){
                    return redirect()->to('/owner/dashboard');

                }
            }
        }
        return view('v_login_auth');
    }

    private function setUserSession($user){
        $data = [
            'id_user' => $user['id_user'],
            'nama_pengguna' => $user['nama_pengguna'],
            'username' => $user['username'],
            'password' => $user['password'],
            'id_outlet' => $user['id_outlet'],
            'role' => $user['role'],
            'logged_in' => true
        ];

        session()->set($data);
        return true;
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/auth');
    }
}