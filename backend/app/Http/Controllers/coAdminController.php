<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\coAdmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class coAdminController extends Controller
{
    public function coAdminLogin(){

        return view('coadmin.coAdminLogin');

    }

    public function coAdminRegister (){

        return view('coadmin.coAdminRegister');
    }

    public function registercoAdmin (Request $request){

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'emailAddress' => 'required|email|unique:users,email',
            'Password' => 'required',
        ]);

        $coadmin = new coAdmin();
        $coadmin->first_name = $request->firstName;
        $coadmin->last_name = $request->lastName;
        $coadmin->email = $request->emailAddress;
        // $coadmin->password = $request->Password;
        //if u want to encrypted the pw
       $coadmin->password = Hash::make($request->Password);

        $res = $coadmin->save();
        if($res){
            return back()->with('success','You have registerd');
        }else{
            return back()->with('fail','You have failed registaration');
        }
    }

    public function logincoAdmin(Request $request)
    {
        $coadmin = coAdmin::where('email', '=', $request->emailAddress)->first();
        if ($coadmin && Hash::check($request->Password, $coadmin->password)) {
            $request->session()->put('loginId', $coadmin->id);
            return redirect('allDashboard1');
        } else {
            return back()->with('fail', 'Your password is incorrect');
        }
    }
    public function logoutcoAdmin(Request $request)
    {
        $request->session()->forget('loginId');
        $request->session()->flush();

        return redirect('/coAdminLogin')->with('success', 'Logged out successfully');
    }
    public function coAdminProfile()
    {
        $coadmin = null;

        if (Session::has('loginId')) {
            $coadminId = Session::get('loginId');

            $coadmin = coAdmin::find($coadminId);

            if (!$coadmin) {
                return redirect('/coAdminRegister')->with('fail', 'User not found');
            }
        } else {
            return redirect('/coAdminLogin')->with('fail', 'Login required');
        }

        return view('coadmin.coAdminProfile', compact('coadmin'));
    }
    public function coAdminEdit(Request $request)
    {
        $userId = $request->id;

        $coadmin = coAdmin::find($userId);

        if (!$coadmin) {
            return back()->with('fail', 'User not found');
        }

        return view('coadmin.coAdminEdit', compact('coadmin'));
    }

    public function coAdminUpdate(Request $request)
        {
            $userId = $request->id;

            $coadmin = coAdmin::find($userId);

            if (!$coadmin) {
                return back()->with('fail', 'User not found');
            }

            $coadmin->first_name = $request->firstName;
            $coadmin->last_name = $request->lastName;

            $coadmin->save();

            return redirect('/coAdminProfile')->with('success', 'User updated successfully');
        }
        public function showcoAdmin(Request $request)
    {
        $search = $request['search'] ?? "";
        
        if ($search != "") {
            $coadmin = coAdmin::where('first_name', 'Like', '%' . $request->search . '%')
                ->orWhere('last_name', 'Like', '%' . $request->search . '%')
                ->orWhere('email', 'Like', '%' . $request->search . '%')
                ->get();
        } else {
            $coadmin = coAdmin::all();
        }
        
        return view('admin.index3', ["search" => $coadmin]);
    }
    public function coAdminEditall(Request $request)
    {
        $userId = $request->id;

        $coadmin = coAdmin::find($userId);

        if (!$coadmin) {
            return back()->with('fail', 'User not found');
        }

        return view('admin.coAdminEditall', compact('coadmin'));
    }

    public function coAdminUpdateall(Request $request)
        {
            $userId = $request->id;

            $coadmin = coAdmin::find($userId);

            if (!$coadmin) {
                return back()->with('fail', 'User not found');
            }

            $coadmin->first_name = $request->firstName;
            $coadmin->last_name = $request->lastName;

            $coadmin->save();

            return redirect('/index3')->with('success', 'User updated successfully');
        }

        public function deletecoAdmin(Request $request){

            $get_id = $request->id;
    
            //Option #1
            $deleted = coAdmin::where('id', $get_id)->delete();
    
            //Option #2
            //$deleted = DB::table('tbl_order')->where('ord_id', '=', $r_id)->delete();
    
    
            return redirect('/index3');
        }
}
