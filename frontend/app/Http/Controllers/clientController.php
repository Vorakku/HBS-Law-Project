<?php

namespace App\Http\Controllers;

use App\Models\Lawyers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class clientController extends Controller
{
    public function home(Request $request){
        return view('home');
    }

    public function uhome(Request $request){
        return view('user.uhome');
    }

    public function uabout(Request $request){
        return view('user.uabout');
    }

    public function uannoucement(Request $request){
        return view('user.uannoucement');
    }

    public function ucontact(Request $request){
        return view('user.ucontact');
    }

    public function signin(){

        return view('signin');

    }

    public function register_client (){

        return view('register_client');
    }

    // Insert function for register Client
    public function registerClient (Request $request){

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            // 'dob' => 'required',
            'emailAddress' => 'required|email|unique:users,email',
            'Password' => 'required',
        ]);

        $user = new Users();
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->gender = $request->gender;
        $user->email = $request->emailAddress;
        //if u want to encrypted the pw
        $user->password = Hash::make($request->Password);

        $res = $user->save();
        if($res){
            return back()->with('success','You have registerd');
        }else{
            return back()->with('fail','You have failed registaration');
        }
    }

    // Login Client function to check the email and passwords.
    public function loginClient(Request $request){
        $user = Users::where('email', '=', $request->emailAddress)->first();
        if (!$user) {
            return back()->with('fail', 'User not found');
        }

        if ($user->is_banned) {
            return back()->with('fail', 'This account is banned. Please contact the administrator for assistance.');
        }

        if (Hash::check($request->Password, $user->password)) {
            $request->session()->put('loginId', $user->id);
            return redirect('/uhome');
        } else {
            return back()->with('fail', 'Your password is incorrect');
        }
    }

    //Function to authenticate client to sign in before viewing lawyer dashboard
    public function profile()
    {
        $data = null;
        if (Session::has('loginId')) {
            $userId = Session::get('loginId');
            $data = Users::find($userId);

        if (!$data) {
            return redirect('/')->with('fail', 'User not found');
        }
        } else {
            return redirect('/signin')->with('fail', 'Login required');
        }

        return view('profile', compact('data'));
    }

    //Log out Function
    public function logout(Request $request)
    {
        $request->session()->forget('loginId');
        $request->session()->flush();

        return redirect('/')->with('success', 'Logged out successfully');
    }

    //Search client ID to edit
    public function clientEdit(Request $request)
    {
        $userId = $request->id;
        $user = Users::find($userId);

        if (!$user) {
            return back()->with('fail', 'User not found');
        }
        return view('clientEdit', compact('user'));
    }

    //Update Client Function
    public function update(Request $request)
        {
            $userId = $request->id;
            $user = Users::find($userId);

            if (!$user) {
                return back()->with('fail', 'User not found');
            }

            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->gender = $request->gender;
            // $user->email = $request->emailAddress;
            // $user->password = $request->Password;
            $user->save();
            return redirect('/profile')->with('success', 'User updated successfully');
        }

        //END of Client Controller functions

        // Admin Side
        public function showUser(Request $request)
        {
            $search = $request['search'] ?? "";
            $users = Users::where('first_name', 'LIKE', '%' . $search . '%')
                ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->get();

            return view('admin.index', ["search" => $users]);
        }

        public function banUser($id)
        {
            $user = Users::find($id);

            if (!$user) {
                return back()->with('fail', 'User not found');
            }

            $user->is_banned = true;
            $user->save();

            return back()->with('success', 'User banned successfully');
        }

        public function unbanUser($id)
        {
            $user = Users::find($id);

            if (!$user) {
                return back()->with('fail', 'User not found');
            }

            $user->is_banned = false;
            $user->save();

            return back()->with('success', 'User banned successfully');
        }

        public function adminClientEdit(Request $request)
        {
            $userId = $request->id;

            $user = Users::find($userId);

            if (!$user) {
                return back()->with('fail', 'User not found');
            }

            return view('admin.adminClientEdit', compact('user'));
        }

        public function adminUpdateClient(Request $request)
            {
                $userId = $request->id;

                $user = Users::find($userId);

                if (!$user) {
                    return back()->with('fail', 'User not found');
                }

                $user->first_name = $request->firstName;
                $user->last_name = $request->lastName;
                // $user->date_of_birth = $request->dob;
                $user->gender = $request->gender;
                // $user->email = $request->emailAddress;
                // $user->password = $request->Password;

                $user->save();

                return redirect('/index')->with('success', 'User updated successfully');
            }

            public function deleteClient(Request $request){

                $get_id = $request->id;

                //Option #1
                $deleted = Users::where('id', $get_id)->delete();

                //Option #2
                //$deleted = DB::table('tbl_order')->where('ord_id', '=', $r_id)->delete();
                return redirect('/index');
            }

            public function search(Request $request){
                $query = $request->query('query') ?? '';
                //dd($query);
                $lawyers = Lawyers::where('first_name', 'like', '%'. $query .'%')
                ->orWhere('last_name', 'like', '%'. $query .'%')
                ->orWhere('Field', 'like', '%'. $query .'%')
                ->orWhere('Field2', 'like', '%'. $query .'%')
                ->get();
                return view('result',[
                    'lawyers' => $lawyers
                ]);
            }
}
