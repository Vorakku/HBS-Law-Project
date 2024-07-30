<?php

namespace App\Http\Controllers;

use App\Models\Lawyers;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    protected $userData;

    public function __construct(Request $request)
    {
        // This check is for fetching data from api using api_token
        $email = $request->header('email');
        $password = $request->header('password');
        

        $currentEmail = Lawyers::where('email', $email)->first();

        if ($currentEmail) {
            $this->userData = $currentEmail;
        }
    }
    
    public function lawyerDashboard()
    {
        if ($this->userData) {
            return response()->json([
                'Status' => '200'
                ,'lawyer' => $this->userData
            ]);
        }
    }
}
