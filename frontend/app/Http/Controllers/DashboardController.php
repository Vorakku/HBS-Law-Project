<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Lawyers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class DashboardController extends Controller
{
    public function allDashboard()
    {
        $User = Users::all();
        $lawyer = Lawyers::all();
        $admin = Admins::all();

        return view('admin.allDashboard', compact('User', 'lawyer', 'admin'));
    }

}
