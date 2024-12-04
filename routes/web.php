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
use App\Http\Controllers\DailyOperationalController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\DashboardController;

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

Route::get('get-institutions/{districtId}', [UserController::class, 'getInstitutions']);

// store user
Route::post('user/store', [UserController::class, 'store'])->name('storeUser');

// route to list users
Route::get('users', [UserController::class, 'index'])->name('users');

// route to edit users
Route::get('user/editor', [UserController::class, 'edit'])->name('editUsers');

// route to view user
Route::get('user/view/{id}', [UserController::class, 'view'])->name('viewUser');

// route to search users
Route::get('user/search', [UserController::class, 'search'])->name('searchUsers');

// route to send otp when user registering
Route::get('/send-otp/{phoneNumber}', function ($phoneNumber) {
    $OtpService = new \App\Services\OtpService();

    // Generate a random OTP (example: 6 digits)
    $otp = rand(100000, 999999);

    // Send the OTP message
    $response = $OtpService->sendOtp($phoneNumber, $otp);

    return response()->json($response);
});

// route to show otp verification form
Route::get('/verify-otp', [UserController::class, 'showOtpForm'])->name('showForm');

// route to verify otp
Route::post('/verify_otp', [UserController::class, 'verifyOtp'])->name('verifyOTP');

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

// route to list generic calls made
Route::get('generic_call', [GenericCallController::class, 'index'])->name('calls');

//route to view generic call record
Route::get('generic_call/edit/{id}', [GenericCallController::class, 'edit'])->name('editCall');

// add air ambulance page 1
Route::get('air_ambulance/add', [AirAmbulanceController::class, 'add'])->name('addAirAmb');
Route::post('air_ambulance/add', [AirAmbulanceController::class, 'storePage'])->name('strPg');

// add air ambulance page 2
Route::get('air_ambulance/add2', [AirAmbulanceController::class, 'add2'])->name('add2AirAmb');

// store module
Route::post('air_ambulance/store', [AirAmbulanceController::class, 'store'])->name('storeAirAmb');

// route to list air ambulance records
Route::get('air_ambulance', [AirAmbulanceController::class, 'index'])->name('air_ambulance');

//route to view air ambulance record to be approved
Route::get('air_ambulance/approve', [AirAmbulanceController::class, 'approve'])->name('approveAA');

//route to edit and approve an air ambulance record
Route::get('air_ambulance/edi/{id}', [AirAmbulanceController::class, 'edit'])->name('editAA');

// route to approve/decline air ambulance
Route::PATCH('air_ambulance/update/{id}', [AirAmbulanceController::class, 'update'])->name('updateAA');

// add incident management
Route::get('incident_management/add', [IncidentManagementController::class, 'add'])->name('addIncMan');

// store incident management
Route::post('incident_management/store', [IncidentManagementController::class, 'store'])->name('storeIncMan');

// route to list incident management
Route::get('incident_management', [IncidentManagementController::class, 'index'])->name('incMan');

// route to edit incident management
Route::get('incident_management/edit/{id}', [IncidentManagementController::class, 'edit'])->name('editIM');

// add complaint management
Route::get('complaint_management/add', [ComplaintManagementController::class, 'add'])->name('addComMan');

// store complaint management
Route::post('complaint_management/store', [ComplaintManagementController::class, 'store'])->name('storeComMan');

// route to list complaint management
Route::get('complaint_management', [ComplaintManagementController::class, 'index'])->name('comMan');

// route to edit complaint management
Route::get('complaint_management/edit/{id}', [ComplaintManagementController::class, 'edit'])->name('editCM');

// add hospital/clinic daily status
Route::get('institution_status/add', [InstitutionDailyStatusController::class, 'add'])->name('addSta');

// store hospital/clinic daily status
Route::post('institution_status/store', [InstitutionDailyStatusController::class, 'store'])->name('storeInstMan');

// route to list hospital/clinic daily status
Route::get('institution_status', [InstitutionDailyStatusController::class, 'index'])->name('instStatus');

// route to edit hospital/clinic daily status
Route::get('institution_status/edit/{id}', [InstitutionDailyStatusController::class, 'edit'])->name('editStatus');

// add forensic/mortuary
Route::get('forensic_mortuary/add', [ForensicController::class, 'add'])->name('addFM');

// store forensic/mortuary
Route::post('forensic_mortuary/store', [ForensicController::class, 'store'])->name('storeFM');

// route to list forensic/mortuary
Route::get('forensic_mortuary', [ForensicController::class, 'index'])->name('foreMort');

// route to edit forensic/mortuary
Route::get('forensic_mortuary/edit/{id}', [ForensicController::class, 'edit'])->name('editFM');

// add daily operational status
Route::get('daily_operational/create', [DailyOperationalController::class, 'create'])->name('createDOS');

// store daily operational status
Route::post('daily_operational/store', [DailyOperationalController::class, 'store'])->name('storeDOS');

// route to list forensic/mortuary
Route::get('daily_operational', [DailyOperationalController::class, 'index'])->name('listDOS');

// route to edit daily operational
Route::get('daily_operational/edit/{id}', [DailyOperationalController::class, 'edit'])->name('editDOS');

// add daily incident management
Route::get('incident_management/add', [IncidentManagementController::class, 'add'])->name('addIM');

// store daily incident management
Route::post('incident_management/store', [IncidentManagementController::class, 'store'])->name('storeIM');

// route to list incident management
Route::get('incident_management', [IncidentManagementController::class, 'index'])->name('listIM');

// route to send sms to users
Route::get('groupSms/create', [SMSController::class, 'create'])->name('sendSMS');

// route to store SMS
Route::post('groupSms/store', [SMSController::class, 'store'])->name('storeSMS');

// route to display dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// route to display air ambulance history
Route::get('dashboard/ambulance', [DashboardController::class, 'airAmbulance'])->name('ambulanceHistory');

// route to display complaint management history
Route::get('dashboard/complaint', [DashboardController::class, 'complaintManagement'])->name('complaintHistory');

// route to display incident history
Route::get('dashboard/incident', [DashboardController::class, 'incidentHistory'])->name('incidentHistory');

// route to display incident history
Route::get('dashboard/operational', [DashboardController::class, 'dailyHistory'])->name('operationalHistory');




