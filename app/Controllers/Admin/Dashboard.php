<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
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