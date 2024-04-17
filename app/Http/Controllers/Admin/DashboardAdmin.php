<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAdmin extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.admin_dashboard', [
            'title' => 'Dashboard Admin',
        ]);
    }

}
