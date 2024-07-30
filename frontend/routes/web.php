<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;
use App\Http\Controllers\lawyerController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// //URL:http://127.0.0.1:8000/
// Route::get('/', function () {
//     return view('welcome');
// });

//default page

//URL:http://127.0.0.1:8000
Route::get('/', [clientController::class, 'home']);
//URL:http://127.0.0.1:8000/about
Route::get('/about', function () {
    return view('about'); //about.blade.php
});

//URL:http://127.0.0.1:8000/people
Route::get('/people', function () {
    return view('people'); //people.blade.php
});

//URL:http://127.0.0.1:8000/annoucement
Route::get('/annoucement', function () {
    return view('annoucement'); //annoucement.blade.php
});

//URL:http://127.0.0.1:8000/contact
Route::get('/contact', function () {
    return view('contact'); //contact.blade.php
});
//URL:http://127.0.0.1:8000/lawyeredit
// Route::get('/lawyeredit', function () {
//     return view('lawyeredit'); //lawyeredit.blade.php
// });



//User or Client page

//URL:http://127.0.0.1:8000/uhome
Route::get('/uhome', [clientController::class, 'uhome']);

//URL:http://127.0.0.1:8000/uabout
Route::get('/uabout', [clientController::class, 'uabout']);

//URL:http://127.0.0.1:8000/uannoucement
Route::get('/uannoucement', [clientController::class, 'uannoucement']);

//URL:http://127.0.0.1:8000/ucontact
Route::get('/ucontact', [clientController::class, 'ucontact']);

//URL:http://127.0.0.1:8000/signin
Route::get('/signin', [clientController::class, 'signin']);

//URL:http://127.0.0.1:8000/register_client
Route::get('/register_client', [clientController::class, 'register_client']);
Route::post('/registerClient', [clientController::class, 'registerClient'])->name('registerClient');
Route::post('/loginClient', [clientController::class, 'loginClient'])->name('loginClient');

Route::get('/profile', [clientController::class, 'profile']); //profile.blade.php

Route::get('/logout', [clientController::class, 'logout']);

Route::get('/clientEdit/{id}', [clientController::class, 'clientEdit']); //clientEdit.blade.php
Route::post('/update', [clientController::class, 'update'])->name('update');

//Ban user
Route::put('/users/{id}/ban', [clientController::class, 'banUser'])->name('users.ban');
//unban
Route::put('/users/{id}/unban', [clientController::class, 'unbanUser'])->name('users.unban');


//Lawyer Page

//URL:http://127.0.0.1:8000/lawhome
Route::get('/lawhome', [lawyerController::class, 'lawhome']);//lawhome.blade,php

//URL:http://127.0.0.1:8000/lawabout
Route::get('/lawabout', [lawyerController::class, 'lawabout']);//lawabout.blade,php

//URL:http://127.0.0.1:8000/lawannoucement
Route::get('/lawannoucement', [lawyerController::class, 'lawannoucement']);//lawannoucement.blade,php

//URL:http://127.0.0.1:8000/lawcontact
Route::get('/lawcontact', [lawyerController::class, 'lawcontact']);//lawcontact.blade,php

Route::get('/dashboard', [lawyerController::class, 'dashboard']); //dashboard.blade.php

Route::get('/logoutLawyer', [lawyerController::class, 'logoutLawyer']);

Route::get('/lawyeredit/{id}', [lawyerController::class, 'lawyeredit']);
Route::post('/update1', [lawyerController::class, 'update1'])->name('update1');

Route::get('/signinLawyer', [lawyerController::class, 'signinLawyer']);//signinLawyer.blade.php

Route::get('/register_lawyer', [lawyerController::class, 'register_lawyer']);

Route::post('/registerLawyer', [lawyerController::class, 'registerLawyer'])->name('registerLawyer');

Route::post('/loginLawyer', [lawyerController::class, 'loginLawyer'])->name('loginLawyer');

//URL:http://127.0.0.1:8000/lawyershow
// Route::get('lawyershow/{id}',[lawyerController::class,'lawyerShow']);
Route::get('lawyershow/{id}', [lawyerController::class, 'lawyerShow'])->name('lawyershow');
//Ban user
Route::put('/lawyers/{id}/ban', [lawyerController::class, 'banLawyer'])->name('lawyers.ban');
//unban
Route::put('/lawyers/{id}/unban', [lawyerController::class, 'unbanLawyer'])->name('lawyers.unban');


// //URL:http://127.0.0.1:8000/expertise1_lawyer
// Route::get('/expertise1', function () {
//     return view('expertise1'); //expertise1.blade.php
// });

//For admin page
//http://127.0.0.1:8000/login
Route::get('/login', [adminController::class, 'login']);

Route::get('/register', [adminController::class, 'register']);
Route::post('/registerAdmin', [adminController::class, 'registerAdmin'])->name('registerAdmin');
Route::post('/loginAdmin', [adminController::class, 'loginAdmin'])->name('loginAdmin');

Route::get('/adminProfile', [adminController::class, 'adminProfile']); //adminProfile.blade.php
Route::get('/logoutAdmin', [adminController::class, 'logoutAdmin']);

// Route::get('/index', [adminController::class, 'index']);

Route::get('/allDashboard', [DashboardController::class, 'allDashboard']);
Route::get('/index', [clientController::class, 'showUser']);
Route::get('/index1', [lawyerController::class, 'showLawyer']);
Route::get('/index2', [adminController::class, 'showAdmin']);

Route::get('/adminClientEdit/{id}', [clientController::class, 'adminClientEdit']); //adminClientEdit.blade.php
Route::post('/adminUpdateClient', [clientController::class, 'adminUpdateClient'])->name('adminUpdateClient');

Route::get('/adminLawyerEdit/{id}', [lawyerController::class, 'adminLawyerEdit']); //adminLawyerEdit.blade.php
Route::post('/adminUpdateLawyer', [lawyerController::class, 'adminUpdateLawyer'])->name('adminUpdateLawyer');

Route::get('/adminEdit/{id}', [adminController::class, 'adminEdit']); //adminEdit.blade.php
Route::post('/adminUpdate', [adminController::class, 'adminUpdate'])->name('adminUpdate');

Route::get('/adminEditall/{id}', [adminController::class, 'adminEditall']); //adminEditall.blade.php
Route::post('/adminUpdateall', [adminController::class, 'adminUpdateall'])->name('adminUpdateall');

Route::get('/deleteClient/{id}', [clientController::class, 'deleteClient']);
Route::get('/deleteLawyer/{id}', [lawyerController::class, 'deleteLawyer']);
Route::get('/deleteAdmin/{id}', [adminController::class, 'deleteAdmin']);

// expertise
Route::get('aircraft-leasing', [lawyerController::class, 'aircraftLeasing'])->name('aircraft-leasing');
Route::get('banking-finance', [lawyerController::class, 'bankingFinance'])->name('banking-finance');
Route::get('construction-realestate', [lawyerController::class, 'constructionRealestate'])->name('construction-realestate');
Route::get('custom-tax', [lawyerController::class, 'customTax'])->name('custom-tax');
Route::get('dispute-resolution', [lawyerController::class, 'disputeResolution'])->name('dispute-resolution');

//search
// Route::match(['get', 'post'], '/search', [SearchController::class, 'search'])->name('search');
// Route::get('/search',[clientController::class, 'search']);
Route::get('/search',[clientController::class, 'search']);
Route::get('/indvlawyer/{id}',[lawyerController::class, 'showLawyerById']);
