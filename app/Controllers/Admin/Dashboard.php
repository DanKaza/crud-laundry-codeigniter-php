<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    function __construct()
    {
        if (session()->get('role') != "Admin") {
            echo '<script>
            alert("Access Denied!");
            </script>';
            exit;
        }
    }
    public function index()
    {
        
        $data = [
            'title' => "Admin Dashboard | My Laundry",
            'header' => "Dashboard",
        ];

        $data['page'] = view('Admin/v_dashboard', $data);

        return view("Admin/v_homepage", $data);
    }
}