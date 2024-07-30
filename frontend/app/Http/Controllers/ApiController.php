<?php
namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Lawyers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function allDashboard()
    {

        $User = Users::all();
        $lawyer = Lawyers::all();
        $admin = Admins::all();
        return response()->json([
            "Admins:" => $admin,
            "Users:" =>$User,
            "Lawyers:"=>$lawyer
        ]);
        // return view('admin.allDashboard', compact('User', 'lawyer', 'admin'));
    }

    public function userDashboard()
    {
        $User = Users::all();
        return response()->json([
            "Users:" =>$User
        ]);
    }

    public function adminDashboard()
    {
        $admin = Admins::all();
        return response()->json([
            "Admins:" =>$admin
        ]);
    }
    public function lawyerDashboard()
    {
        $lawyer = Lawyers::all();
        return response()->json([
            "Lawyers:" =>$lawyer
        ]);
    }

    //User or Client Api
    public function loginClient(Request $request)
    {
        $user = Users::where('email', '=', $request->emailAddress)->first();

        if (!$user) {
            return response()->json([
              'fail' => 'User not found'
            ], 404);  //back()->with('fail', 'User not found');
        }

        if ($user->is_banned) {
            return response()->json([
                'fail' => 'This account is banned. Please contact the administraor for assistance.'
            ], 404);
                    //back()->with('fail', 'This account is banned. Please contact the administrator for assistance.');
        }

        if (Hash::check($request->Password, $user->password)) {
            //$request->session()->put('loginId', $user->id);
            return response()->json([
                'status' => 'success.'
            ], 200);
            //redirect('/uhome');
        } else {
            return response()->json([
                'fail' => 'Your password is incorrect.'
            ], 404);
            //back()->with('fail', 'Your password is incorrect');
        }
    }
    public function registerClient(Request $request)
    {

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
        // $user->date_of_birth = $request->dob;
        $user->gender = $request->gender;
        $user->email = $request->emailAddress;
        // $user->password = $request->Password;
        //if u want to encrypted the pw
        $user->password = Hash::make($request->Password);

        $res = $user->save();
        if ($res) {
            return
            response()->json([
            'success' => 'You have registerd'],201);
        } else {
            return response()->json(['fail' => 'You have failed registaration'],404);
        }
    }
    public function deleteClient(Request $request)
    {

        $get_id = $request->id;

        //Option #1
        $deleted = Users::where('id', $get_id)->delete();

        //Option #2
        //$deleted = DB::table('tbl_order')->where('ord_id', '=', $r_id)->delete();

        if($deleted){
        return
        response()->json(['deleted' => "Success"],200);
        }
        else
        {
            return
            response()->json(['deleted' => "Fail"],404);
        }
    }
    public function updateClient(Request $request)
    {
        $userId = $request->id;

        $user = Users::find($userId);
        if (!$user) {
            return
            response()->json([
                'Client Update' => 'Fail'
            ],404);
        }
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        // $user->date_of_birth = $request->dob;
        $user->gender = $request->gender;
        // $user->email = $request->emailAddress;
        // $user->password = $request->Password;
        $user->save();
        return response()->json(['Client Update' => 'Success'],200);
    }

    //Lawyer Api
    public function registerLawyer(Request $request)
    {
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
        // $user->password = $request->Password;
        //if u want to encrypted the pw
        $law->password = Hash::make($request->Password);
        $law->education = $request->education;
        $law->accomplishment = $request->accomplishment;

        $res = $law->save();
        if($res){
            return response()->json(['Success'=>'You are registered'],200);
        }else{
            return response()->json(['Fail','You have failed registaration'],404);
        }
    }
    public function loginLawyer (Request $request)
    {
        // $request->validate([
        //     'emailAddress' => 'required',
        //     'Password' => 'required',
        // ]);

        $law = lawyers::where('email','=',$request->emailAddress)->first();
        if (!$law) {
            return response()->json(['Fail'=>'User not found'],404);
        }

        if ($law->is_banned) {
            return response()->json(['Fail' => 'This account is banned. Please contact the administrator for assistance.'],404);
        }

        if (Hash::check($request->Password, $law->password)) {
            $request->session()->put('loginId', $law->id);
            return response()->json(['Success' => 'Login is successful'],200);
        } else {
            return response()->json(['Fail' => 'Your password is incorrect'],404);
        }
    }
    public function deleteLawyer(Request $request)
    {

        $get_id = $request->id;

        //Option #1
        $deleted = lawyers::where('id', $get_id)->delete();

        //Option #2
        //$deleted = DB::table('tbl_order')->where('ord_id', '=', $r_id)->delete();


        if($deleted){
            return
            response()->json(['deleted' => "Success"],200);
            }
            else
            {
                return
                response()->json(['deleted' => "Fail"],404);
            }
    }
    public function updateLawyer(Request $request)
    {
            $userId = $request->id;

            $law = lawyers::find($userId);

            if (!$law) {
                return response()->json(['Fail' => 'User not found'],404);
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

            return response()->json(['Success', 'User updated successfully'],200);
    }

    //Admin Api
    public function adminLawyerUpdate(Request $request)
    {
            $userId = $request->id;

            $law = lawyers::find($userId);

            if (!$law) {
                return response()->json(['Fail' => 'User not found'],404);
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

            return response()->json(['Success' => 'User updated successfully'],200);
    }
    public function adminUpdateClient(Request $request)
    {
        $userId = $request->id;

        $user = Users::find($userId);

        if (!$user) {
            return response()->json(['Fail' => 'User not found'],404);
        }

        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        // $user->date_of_birth = $request->dob;
        $user->gender = $request->gender;
        // $user->email = $request->emailAddress;
        // $user->password = $request->Password;

        $user->save();

        return response()->json(['Success', 'User updated successfully'],200);
    }
    public function registerAdmin (Request $request)
    {
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
            return response()->json(['Success' =>'You have registerd'],200);
        }else{
            return response()->json(['Fail','You have failed registaration'],200);
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

        return redirect('/login')->with('success', 'Logged out successfully');
    }
    public function adminUpdate(Request $request)
    {
            $userId = $request->id;

            $admin = admins::find($userId);

            if (!$admin) {
                return response()->json(['Fail' => 'User not found'],404);
            }

            $admin->first_name = $request->firstName;
            $admin->last_name = $request->lastName;

            $admin->save();

            return response()->json(['Success' => 'User updated successfully'],200);
    }
    public function deleteAdmin(Request $request)
    {

        $get_id = $request->id;

        //Option #1
        $deleted = admins::where('id', $get_id)->delete();

        //Option #2
        //$deleted = DB::table('tbl_order')->where('ord_id', '=', $r_id)->delete();
        if($deleted){
            return
            response()->json(['Deleted' => "Success"],200);
            }
            else
            {
                return
                response()->json(['Deleted' => "Fail"],404);
            };
    }
    public function adminBanUser($id)
    {
        $user = Users::find($id);

        if (!$user) {
            return response()->json(['Fail' => 'User not found'],404);
        }

        $user->is_banned = true;
        $user->save();

        return response()->json(['Success' => 'User banned successfully'],200);
    }
    public function adminUnbanUser($id)
    {
        $user = Users::find($id);

        if (!$user) {
            return response()->json(['Fail'=> 'User not found'],404);
        }

        $user->is_banned = false;
        $user->save();

        return response()->json(['Success' => 'User banned successfully'],200);
    }
    public function adminBanLawyer($id)
    {
        $law = lawyers::find($id);

        if (!$law) {
            return response()->json(['Fail'=> 'User not found'],404);
        }

        $law->is_banned = true;
        $law->save();

        return response()->json(['success', 'User banned successfully'],200);
    }
    public function adminUnbanLawyer($id)
    {
        $law = lawyers::find($id);

        if (!$law) {
            return response()->json(['Fail'=> 'User not found'],404);
        }

        $law->is_banned = false;
        $law->save();

        return response()->json(['Success'=> 'User banned successfully'],200);
    }
}
