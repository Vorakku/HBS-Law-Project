<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Lawyers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    // This controller is for all public routes
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
            'Success' => 'You have registerd'],201);
        } else {
            return response()->json(['fail' => 'You have failed registaration'],404);
        }
    }
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

        public function searchLawyer(Request $request){
        $query = $request->query('query') ?? '';
        //dd($query);
        $lawyers = Lawyers::Where('Field', 'like', '%'. $query .'%')->get();
        return response()->json([
            'lawyers' => $lawyers
        ],200);
    }
}
