<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userData;

    public function __construct(Request $request)
    {
        // This check is for fetching data from api using api_token

            $email = $request->header('email');
            $password = $request->header('password');


            $currentEmail = Users::where('email', $email)->first();

            if ($currentEmail) {
                $this->userData = $currentEmail;
            }
    }

    public function userDashboard()
    {
        if ($this->userData) {
            return response()->json([
                'Status' => '200'
                ,'user' => $this->userData
            ]);
        }
    }
}
