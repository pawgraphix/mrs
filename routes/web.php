<?php

use App\Http\Controllers\AssetCategoryController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MaintenanceRequestController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRolesController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

//Route::get('/', function () {
//    return view('welcome');
//});

// Show login/register combined form
//Route::get('/', [AuthenticationController::class, 'index'])->name('index');
Route::get('/', [AuthenticationController::class, 'welcome'])->name('welcome');

// Handle GET /login gracefully (fixes the error)
//Route::get('login', function () {
//    return redirect()->route('index');
//});
Route::get('login', [AuthenticationController::class, 'index'])->name('index');

// Handle POST login form submission
Route::post('login', [AuthenticationController::class, 'login'])->name('login');

// Show register form (optional, points to same index)
Route::post('register', [AuthenticationController::class, 'showRegisterForm'])->name('register');

Route::post('/check-email', [AuthenticationController::class, 'checkEmail']);

////AJAX
//Route::post('/check-email', function (Request $request) {
//    $exists = User::where('email', $request->email)->exists();
//    return response()->json(['exists' => $exists]);
//});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AuthenticationController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');

    // Roles
    Route::resource('roles', RolesController::class)->except(['create', 'show', 'destroy']);
    Route::get('roles/destroy/{id}', [RolesController::class,'destroy'])->name('roles.destroy');

    // Users
    Route::resource('users', UserController::class)->except(['create', 'show', 'destroy']);
    Route::get('users/destroy/{id}', [UserController::class,'destroy'])->name('users.destroy');
    Route::post('change-password', [UserController::class,'changePassword'])->name('change-password');

    // UserRoles
    Route::resource('UserRoles', UserRolesController::class)->except(['create', 'show', 'destroy']);
    Route::get('UserRoles/destroy/{id}', [UserRolesController::class,'destroy'])->name('UserRoles.destroy');

    //Department
    Route::resource('departments', DepartmentController::class)->except(['create', 'show', 'destroy']);
    Route::get('departments/destroy/{id}', [DepartmentController::class,'destroy'])->name('departments.destroy');

    //Asset Category
    Route::resource('asset_categories', AssetCategoryController::class)->except(['create', 'show', 'destroy']);
    Route::get('asset_categories/destroy/{id}', [AssetCategoryController::class,'destroy'])->name('asset_categories.destroy');

    //Asset
    Route::resource('room-assets', AssetController::class)->except(['create', 'show', 'destroy']);
    Route::get('room-assets/destroy/{id}', [AssetController::class,'destroy'])->name('room-assets.destroy');

    //Maintenance Request
    Route::resource('maintenance_requests', MaintenanceRequestController::class)->except(['create', 'show', 'destroy']);
    Route::get('maintenance_requests/destroy/{id}', [MaintenanceRequestController::class,'destroy'])->name('maintenance_requests.destroy');
    Route::get('maintenance_requests/submit/{id}', [MaintenanceRequestController::class,'submitRequest'])->name('maintenance_requests.submit');
    Route::get('maintenance_requests/hod', [MaintenanceRequestController::class,'hodIndex'])->name('maintenance_requests.hod');
    Route::get('maintenance_requests/approve/{id}', [MaintenanceRequestController::class,'approveRequest'])->name('maintenance_requests.approve');
    Route::get('maintenance_requests/approved', [MaintenanceRequestController::class,'approvedRequests'])->name('maintenance_requests.approved');
    Route::get('maintenance_requests/resolved',[MaintenanceRequestController::class,'resolvedRequests'])->name('maintenance_requests.resolved');
    Route::get('maintenance_requests/resolve/{id}',[MaintenanceRequestController::class,'resolveRequest'])->name('maintenance_requests.resolve');
    Route::get('maintenance_requests/reject/{id}', [MaintenanceRequestController::class,'rejectForm'])->name('maintenance_requests.reject-form');
    Route::post('maintenance_requests/reject',  [MaintenanceRequestController::class,'rejectRequest'])->name('maintenance_requests.reject');
    Route::get('maintenance_requests/rejected', [MaintenanceRequestController::class,'rejectedRequests'])->name('maintenance_requests.rejected');

    //Locations
    Route::resource('locations', LocationController::class)->except(['create', 'show', 'destroy']);
    Route::get('locations/destroy/{id}', [LocationController::class,'destroy'])->name('locations.destroy');


    //Reports
    Route::get('rp-maintenance-index', [ReportController::class,'index'])->name('rp-maintenance-index');
    Route::post('rp-maintenance', [ReportController::class,'getInfo'])->name('rp-maintenance');
    Route::get('rp-maintenance-excel', [ReportController::class,'downloadExcel'])->name('rp-maintenance-excel');

});

