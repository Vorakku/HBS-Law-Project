<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\PublicController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/', [ApiController::class, 'home']);


Route::middleware('userAuth')->group(function() {
    Route::get('/user', function() {
        return response()->json([
            'message' => 'Welcome to the API User'
        ]);
    });
    Route::post('/user/dashboard', [UserController::class, 'userDashboard']);

});

Route::middleware('lawyerAuth')->group(function() {
    Route::get('/lawyer', function() {
        return response()->json([
            'message' => 'Welcome to the API Lawyer'
        ]);
    });
    Route::post('/lawyer/dashboard', [LawyerController::class, 'lawyerDashboard']);

});

Route::controller(PublicController::class)->group(function() {
    // Route::get('/allDashboard', [PublicController::class, 'allDashboard']);
    // Route::get('/lawyerDashboard', [ApiController::class, 'lawyerDashboard']);
    Route::post('/registerClient', [PublicController::class, 'registerClient']);
    Route::post('/registerLawyer', [PublicController::class, 'registerLawyer']);
    Route::get('/searchLawyer', [PublicController::class, 'searchLawyer']);
});

