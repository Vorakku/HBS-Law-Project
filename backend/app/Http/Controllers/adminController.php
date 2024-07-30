<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\Admins;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    public function login(){

        return view('admin.login');

    }

    public function register (){

        return view('admin.register');
    }

    public function registerAdmin (Request $request){

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'emailAddress' => 'required|email|unique:users,email',
            'Password' => 'required',
        ]);

        $admin = new admins();
        $admin->first_name = $request->firstName;
        $admin->last_name = $request->lastName;
        $admin->email = $request->emailAddress;
        // $user->password = $request->Password;
        //if u want to encrypted the pw
       $admin->password = Hash::make($request->Password);

        $res = $admin->save();
        if($res){
            return back()->with('success','You have registerd');
        }else{
            return back()->with('fail','You have failed registaration');
        }
    }

    public function loginAdmin(Request $request)
    {
        $admin = admins::where('email', '=', $request->emailAddress)->first();
        if ($admin && Hash::check($request->Password, $admin->password)) {
            $request->session()->put('loginId', $admin->id);
            return redirect('allDashboard');
        } else {
            return back()->with('fail', 'Your password is incorrect');
        }
    }

    public function logoutAdmin(Request $request)
    {
        $request->session()->forget('loginId');
        $request->session()->flush();

        return redirect('/')->with('success', 'Logged out successfully');
    }

    public function adminProfile()
{
    // Initialize the $admin variable
    $admin = null;

    // Check if admin is logged in
    if (Session::has('loginId')) {
        // Retrieve the admin's ID from the session
        $adminId = Session::get('loginId');

        // Find the admin by their ID
        $admin = admins::find($adminId);

        // Check if admin is found
        if (!$admin) {
            // Redirect to registration page with a failure message if admin is not found
            return redirect('/register')->with('fail', 'User not found');
        }
    } else {
        // Redirect to login page with a failure message if admin is not logged in
        return redirect('/login')->with('fail', 'Login required');
    }

    // Pass the $admin variable to the adminProfile view
    return view('admin.adminProfile', compact('admin'));
}


    public function index(){

        return view('admin.index');

    }

    public function showAdmin(Request $request)
    {
        $search = $request['search'] ?? "";
        
        if ($search != "") {
            $admin = admins::where('first_name', 'Like', '%' . $request->search . '%')
                ->orWhere('last_name', 'Like', '%' . $request->search . '%')
                ->orWhere('email', 'Like', '%' . $request->search . '%')
                ->get();
        } else {
            $admin = admins::all();
        }
        
        return view('admin.index2', ["search" => $admin]);
    }
    
    

    public function adminEdit(Request $request)
    {
        $userId = $request->id;

        $admin = admins::find($userId);

        if (!$admin) {
            return back()->with('fail', 'User not found');
        }

        return view('admin.adminEdit', compact('admin'));
    }

    public function adminUpdate(Request $request)
        {
            $userId = $request->id;

            $admin = admins::find($userId);

            if (!$admin) {
                return back()->with('fail', 'User not found');
            }

            $admin->first_name = $request->firstName;
            $admin->last_name = $request->lastName;

            $admin->save();

            return redirect('/adminProfile')->with('success', 'User updated successfully');
        }

        public function adminEditall(Request $request)
    {
        $userId = $request->id;

        $admin = admins::find($userId);

        if (!$admin) {
            return back()->with('fail', 'User not found');
        }

        return view('admin.adminEditall', compact('admin'));
    }

    public function adminUpdateall(Request $request)
        {
            $userId = $request->id;

            $admin = admins::find($userId);

            if (!$admin) {
                return back()->with('fail', 'User not found');
            }

            $admin->first_name = $request->firstName;
            $admin->last_name = $request->lastName;

            $admin->save();

            return redirect('/index2')->with('success', 'User updated successfully');
        }
        public function deleteAdmin(Request $request){

            $get_id = $request->id;
    
            //Option #1
            $deleted = admins::where('id', $get_id)->delete();
    
            //Option #2
            //$deleted = DB::table('tbl_order')->where('ord_id', '=', $r_id)->delete();
    
    
            return redirect('/index2');
        }
    
    public function aircraftLeasing()
    {
        $lawyers = DB::table('lawyers')
                ->where('Field', 'AIRCRAFT LEASING & PURCHASE')
                ->get();
        return view('aircraft_leasing', ['lawyers' => $lawyers]);
    }
    
    public function bankingFinance()
    {
        $lawyers = DB::table('lawyers')
                ->where('Field', 'BANKING & FINANCE')
                ->get();
        return view('banking_finance',['lawyers' => $lawyers]);
    }

    public function constructionRealestate()
    {
        $lawyers = DB::table('lawyers')
        ->where('Field', 'CONSTRUCTION & REAL ESTATE DEVELOPEMENT')
        ->get();
        return view('constructor_real_estate', ['lawyers' => $lawyers]);
    }

    public function customTax()
    {
        $lawyers = DB::table('lawyers')
        ->where('Field', 'CUSTOMS AND TAX')
        ->get();
        return view('custom_tax', ['lawyers' => $lawyers]);
    }

    public function disputeResolution()
    {
        $lawyers = DB::table('lawyers')
        ->where('Field', 'DISPUTE RESOLUTION AND LITIGATION')
        ->get();
        return view('dispute_resolution', ['lawyers' => $lawyers]);
    }

}
