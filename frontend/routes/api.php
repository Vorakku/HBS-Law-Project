<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [ApiController::class, 'home']);


//Client Api
Route::post('/loginClient', [ApiController::class, 'loginClient']);
Route::post('/registerClient', [ApiController::class, 'registerClient']);

Route::post('/updateClient', [ApiController::class, 'updateClient' ]);

//lawyer Api
Route::post('/loginLawyer', [ApiController::class, 'loginLawyer']);
Route::post('/registerLawyer', [ApiController::class, 'registerLawyer']);
Route::post('/updateLawyer', [ApiController::class, 'updateLawyer' ]);

//Admin Api
Route::post('/loginAdmin', [ApiController::class, 'loginAdmin']);
Route::post('/registerAdmin', [ApiController::class, 'registerAdmin']);
Route::post('/deleteAdmin', [ApiController::class, 'deleteAdmin' ]);
Route::post('/updateAdmin', [ApiController::class, 'updateAdmin' ]);
Route::post('/adminLawyerEdit', [ApiController::class, 'adminLawyerEdit' ]);
Route::post('/adminLawyerUpdate', [ApiController::class, 'adminLawyerUpdate' ]);
Route::post('/adminClientEdit', [ApiController::class, 'adminClientEdit' ]);
Route::post('/adminClientUpdate', [ApiController::class, 'adminClientUpdate' ]);
Route::post('/logoutAdmin', [ApiController::class, 'logoutAdmin' ]);
Route::post('/admminBanUser', [ApiController::class, 'adminBanUser' ]);
Route::post('/adminUnbanUser', [ApiController::class, 'adminUnbanUser' ]);
Route::post('/adminBanLawyer', [ApiController::class, 'adminBanLawyer' ]);
Route::post('/adminUnbanLawyer', [ApiController::class, 'adminUnbanLawyer' ]);
Route::post('/deleteClient', [ApiController::class, 'deleteClient' ]);
Route::post('/deleteLawyer', [ApiController::class, 'deleteLawyer' ]);
Route::get('/allDashboard', [ApiController::class, 'allDashboard']);
Route::get('/userDashboard', [ApiController::class, 'userDashboard']);
Route::get('/lawyerDashboard', [ApiController::class, 'lawyerDashboard']);
Route::get('/adminDashboard', [ApiController::class, 'adminDashboard']);
