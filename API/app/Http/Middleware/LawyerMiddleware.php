<?php

namespace App\Http\Middleware;

use App\Models\Lawyers;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LawyerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
    //  * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // This check is for fetching data from api using api_token
        // if ($request->header('Authorization')) {
        //     $api_token = $request->header('Authorization');

        //     $uni = University::where('api_token', $api_token)->first();

        //     if ($uni) {
        //         return $next($request);
        //     }
        // }
        $email = $request->header('email');
        $password = $request->header('password');


        if ($email) {
            $currentEmail = Lawyers::where('email', $email)->first();
    
            if (Hash::check($password, $currentEmail->password)) {
                return $next($request);
            }
        }

        return response()->json(['message' => 'You are not authorized to access this lawyer route.'], 401);
    }
}
