<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\GenericCallController;
use App\Http\Controllers\AirAmbulanceController;
use App\Http\Controllers\IncidentManagementController;
use App\Http\Controllers\ComplaintManagementController;
use App\Http\Controllers\InstitutionDailyStatusController;
use App\Http\Controllers\ForensicController;

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

Route::get('/', function () {
    return view('welcome');
});

// show the login form
Route::get('login', [UserController::class, 'showLogin'])->name('login');

// process the login form
Route::post('login', array(UserController::class, 'doLogin'))->name('login');

// process the logout
Route::get('users/logout', [UserController::class, 'doLogout'])->name('logout');

// add user
Route::get('user/add', [UserController::class, 'add'])->name('addUser');

// store user
Route::post('user/store', [UserController::class, 'store'])->name('storeUser');

// route to list users
Route::get('users', [UserController::class, 'index'])->name('users');

// route to edit users
Route::get('user/edit', [UserController::class, 'edit'])->name('editUser');

// route to list module
Route::get('modules', [ModuleController::class, 'index'])->name('modules');

// add module
Route::get('module/add', [ModuleController::class, 'add'])->name('addModule');

// store module
Route::post('module/store', [ModuleController::class, 'store'])->name('storeModule');

// create generic call
Route::get('generic_call/create', [GenericCallController::class, 'create'])->name('addCall');

// store generic call
Route::post('generic_call/store', [GenericCallController::class, 'store'])->name('storeCall');

//route to view generic call record
Route::get('generic_call/edit', [GenericCallController::class, 'edit'])->name('editCall');

// route to list generic calls made
Route::get('calls', [GenericCallController::class, 'index'])->name('calls');

// add complaint_management
Route::get('complaint_management/add', [ComplaintController::class, 'add'])->name('addComplaint');

// add air ambulance page 1
Route::get('air_ambulance/add', [AirAmbulanceController::class, 'add'])->name('addAirAmb');
Route::post('air_ambulance/add', [AirAmbulanceController::class, 'storePage'])->name('strPg');

// add air ambulance page 2
Route::get('air_ambulance/add2', [AirAmbulanceController::class, 'add2'])->name('add2AirAmb');

// store module
Route::post('air_ambulance/store', [AirAmbulanceController::class, 'store'])->name('storeAirAmb');

// route to list air ambulance records
Route::get('air_ambulance', [AirAmbulanceController::class, 'index'])->name('air_ambulance');

//route to view air ambulance record
Route::get('air_ambulance/edit', [AirAmbulanceController::class, 'edit'])->name('editAirAmb');

// add incident management
Route::get('incident_management/add', [IncidentManagementController::class, 'add'])->name('addIncMan');

// store incident management
Route::post('incident_management/store', [IncidentManagementController::class, 'store'])->name('storeIncMan');

// route to list incident management
Route::get('incident_management', [IncidentManagementController::class, 'index'])->name('incMan');

// route to edit incident management
Route::get('incident_management/edit', [IncidentManagementController::class, 'edit'])->name('editIncMan');

// add complaint management
Route::get('complaint_management/add', [ComplaintManagementController::class, 'add'])->name('addComMan');

// store complaint management
Route::post('complaint_management/store', [ComplaintManagementController::class, 'store'])->name('storeComMan');

// route to list complaint management
Route::get('complaint_management', [ComplaintManagementController::class, 'index'])->name('comMan');

// route to edit complaint management
Route::get('complaint_management/edit', [ComplaintManagementController::class, 'edit'])->name('editComMan');

// add hospital/clinic daily status
Route::get('institution_status/add', [InstitutionDailyStatusController::class, 'add'])->name('addSta');

// store hospital/clinic daily status
Route::post('institution_status/store', [InstitutionDailyStatusController::class, 'store'])->name('storeInstMan');

// route to list hospital/clinic daily status
Route::get('institution_status', [InstitutionDailyStatusController::class, 'index'])->name('instStatus');

// route to edit hospital/clinic daily status
Route::get('institution_status/edit', [InstitutionDailyStatusController::class, 'edit'])->name('editStatus');

// add forensic/mortuary
Route::get('forensic_mortuary/add', [ForensicController::class, 'add'])->name('addFM');

// store forensic/mortuary
Route::post('forensic_mortuary/store', [ForensicController::class, 'store'])->name('storeFM');

// route to list forensic/mortuary
Route::get('forensic_mortuary', [ForensicController::class, 'index'])->name('foreMort');

// route to edit forensic/mortuary
Route::get('forensic_mortuary/edit', [ForensicController::class, 'edit'])->name('editFM');

