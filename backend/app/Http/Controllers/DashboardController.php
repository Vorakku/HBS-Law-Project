<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Lawyers;
use App\Models\Users;
use App\Models\coAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class DashboardController extends Controller
{
    public function allDashboard()
    {
        $User = Users::all();
        $lawyer = Lawyers::all();
        $admin = Admins::all();
        $coadmin = coAdmin::all();

        return view('admin.allDashboard', compact('User', 'lawyer', 'admin','coadmin'));
    }

    public function allDashboard1()
    {
        $User = Users::all();
        $lawyer = Lawyers::all();

        return view('coadmin.allDashboard1', compact('User', 'lawyer'));
    }

}
