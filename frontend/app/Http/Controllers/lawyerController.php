<?php

namespace App\Http\Controllers;

use App\Models\Lawyers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class lawyerController extends Controller
{
    public function lawhome(Request $request){
        return view('lawyer.lawhome');
    }

    public function lawabout(Request $request){
        return view('lawyer.lawabout');
    }

    public function lawannoucement(Request $request){
        return view('lawyer.lawannoucement');
    }

    public function lawcontact(Request $request){
        return view('lawyer.lawcontact');
    }

    public function signinLawyer(){

        return view('signinLawyer');

    }

    public function register_lawyer (){

        return view('register_lawyer');
    }

    //Function to register Lawyers
    public function registerLawyer(Request $request){
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'dob' => 'required',
            'phoneNumber' => 'required',
            'emailAddress' => 'required|email|unique:lawyers,email',
            'Password' => 'required',
            'education' => 'required',
            'accomplishment' => 'required',
        ]);

        $law = new lawyers();
        $law->first_name = $request->firstName;
        $law->last_name = $request->lastName;
        $law->date_of_birth = $request->dob;
        $law->gender = $request->gender;
        $law->language = $request->Language;
        $law->Field = $request->field;
        $law->Field2 = $request->field2;
        $law->phone_number = $request->phoneNumber;
        $law->email = $request->emailAddress;
        //if u want to encrypted the pw
        $law->password = Hash::make($request->Password);
        $law->education = $request->education;
        $law->accomplishment = $request->accomplishment;
        $res = $law->save();
        return redirect('signinLawyer');
    }

    //Login Function
    public function loginLawyer (Request $request){
        $law = lawyers::where('email','=',$request->emailAddress)->first();
        if (!$law) {
            return back()->with('fail', 'User not found');
        }

        if ($law->is_banned) {
            return back()->with('fail', 'This account is banned. Please contact the administrator for assistance.');
        }

        if (Hash::check($request->Password, $law->password)) {
            $request->session()->put('loginId', $law->id);
            return redirect('/lawhome');
        } else {
            return back()->with('fail', 'Your password is incorrect');
        }
    }

    //Function to show lawyer DASHBOARD
    public function dashboard()
    {
        $data1 = null;
        if (Session::has('loginId')) {
            $userId = Session::get('loginId');

            $data1 = Lawyers::find($userId);

            if (!$data1) {
                return redirect('/')->with('fail', 'User not found');
            }
        } else {
            return redirect('/signinLawyer')->with('fail', 'Login required');
        }

        return view('dashboard', compact('data1'));
    }

    //Dashboard on the website on the expertise to showcase lawyer information.
    public function lawyerShow($id){
        $user = null;

        if (Session::has('loginId')) {
            $userId = Session::get('loginId');
            $user = Lawyers::find($userId);

        if (!$user) {
                return redirect('/')->with('fail', 'User not found');
            }
        } else {
            return redirect('/signin')->with('fail', 'Login required');
        }

        $lawyer = Lawyers::findOrFail($id);

        return view('lawyershow', [
            'lawyer' => $lawyer
        ]);
    }

    //Logout Fuction.
    public function logoutLawyer(Request $request)
    {
        $request->session()->forget('loginId');
        $request->session()->flush();

        return redirect('/')->with('success', 'Logged out successfully');
    }

    //Function for finding ID to edit lawyers
    public function lawyeredit(Request $request)
    {
        $userId = $request->id;
        $law = Lawyers::find($userId);

        if (!$law) {
            return back()->with('fail', 'User not found');
        }

        return view('lawyeredit', compact('law'));
    }

    //Function to update lawyers information
    public function update1(Request $request)
        {
            $userId = $request->id;

            $law = lawyers::find($userId);

            if (!$law) {
                return back()->with('fail', 'User not found');
            }

            $law->first_name = $request->firstName;
            $law->last_name = $request->lastName;
            $law->date_of_birth = $request->dob;
            $law->gender = $request->gender;
            $law->language = $request->Language;
            // $user->email = $request->emailAddress;
            // $user->password = $request->Password;
            // $law->Field = $request->field;
            $law->language = $request->Language;
            $law->phone_number = $request->phoneNumber;
            $law->education = $request->education;
            $law->accomplishment = $request->accomplishment;

            $law->save();
            return redirect('/dashboard')->with('success', 'User updated successfully');
        }

        //Search lawyers by ID
        public function showLawyerById($id)
        {
            $user = null;

        if (Session::has('loginId')) {
            $userId = Session::get('loginId');
            $user = Lawyers::find($userId);

            if (!$user) {
                return redirect('/')->with('fail', 'User not found');
            }
        } else {
            return redirect('/signin')->with('fail', 'Login required');
        }

        $lawyer = Lawyers::findOrFail($id);

        return view('indvlawyer', ['lawyer' => $lawyer]);
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


        // Admin Side

        public function showLawyer(Request $request){ //declare model
            $search = $request['search']??"";
            if($search != "")
            {
                $law = Lawyers::where('first_name', 'Like', '%' .$request->search.'%')
                ->orwhere('last_name', 'Like', '%' .$request->search.'%')
                ->orwhere('email', 'Like', '%' .$request->search.'%')
                ->orwhere('Field', 'Like', '%' .$request->search.'%')
                ->orwhere('date_of_birth', 'Like', '%' .$request->search.'%')
                ->orwhere('language', 'Like', '%' .$request->search.'%')
                ->orwhere('phone_number', 'Like', '%' .$request->search.'%')->get();
            }else {
            $law = lawyers::all();
            }
            return view('admin.index1' ,
            ["search" => $law]
        );
        }

        public function banLawyer($id)
        {
            $law = lawyers::find($id);

            if (!$law) {
                return back()->with('fail', 'User not found');
            }

            $law->is_banned = true;
            $law->save();

            return back()->with('success', 'User banned successfully');
        }

        public function unbanLawyer($id)
        {
            $law = lawyers::find($id);

            if (!$law) {
                return back()->with('fail', 'User not found');
            }

            $law->is_banned = false;
            $law->save();

            return back()->with('success', 'User banned successfully');
        }

        public function adminLawyerEdit(Request $request)
        {
            $userId = $request->id;
            $law = Lawyers::find($userId);

            if (!$law) {
                return back()->with('fail', 'User not found');
            }

            return view('admin.adminLawyerEdit', compact('law'));
        }

        public function adminUpdateLawyer(Request $request)
            {
                $userId = $request->id;

                $law = lawyers::find($userId);

                if (!$law) {
                    return back()->with('fail', 'User not found');
                }

                $law->first_name = $request->firstName;
                $law->last_name = $request->lastName;
                $law->date_of_birth = $request->dob;
                $law->gender = $request->gender;
                $law->language = $request->Language;
                // $user->email = $request->emailAddress;
                // $user->password = $request->Password;
                // $law->Field = $request->field;
                $law->language = $request->Language;
                $law->phone_number = $request->phoneNumber;
                $law->education = $request->education;
                $law->accomplishment = $request->accomplishment;

                $law->save();
                return redirect('/index1')->with('success', 'User updated successfully');
            }

            public function deleteLawyer(Request $request){

                $get_id = $request->id;
                //Option #1
                $deleted = lawyers::where('id', $get_id)->delete();
                //Option #2
                //$deleted = DB::table('tbl_order')->where('ord_id', '=', $r_id)->delete();
                return redirect('/index1');
            }
}
