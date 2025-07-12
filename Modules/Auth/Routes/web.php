<?php
use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DepartmentController;

// Show login/register combined form
Route::get('/', [AuthenticationController::class, 'index'])->name('index');

// Handle GET /login gracefully (fixes the error)
Route::get('login', function () {
    return redirect()->route('index');
});

// Handle POST login form submission
Route::post('login', [AuthenticationController::class, 'login'])->name('login');

// Show register form (optional, points to same index)
Route::get('register', [AuthenticationController::class, 'showRegisterForm'])->name('register');

// Handle POST register form submission
Route::post('register', [AuthenticationController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AuthenticationController::class, 'dashboard'])->name('dashboard');

    // Roles
    Route::resource('roles', 'RolesController')->except(['create', 'show', 'destroy']);
    Route::get('roles/destroy/{id}', 'RolesController@destroy')->name('roles.destroy');

    // Users
    Route::resource('users', 'UserController')->except(['create', 'show', 'destroy']);
    Route::get('users/destroy/{id}', 'UserController@destroy')->name('users.destroy');

    // UserRoles
    Route::resource('UserRoles', 'UserRolesController')->except(['create', 'show', 'destroy']);
    Route::get('UserRoles/destroy/{id}', 'UserRolesController@destroy')->name('UserRoles.destroy');

    //Department
    Route::resource('departments', 'DepartmentController')->except(['create', 'show', 'destroy']);
    Route::get('departments/destroy/{id}', 'DepartmentController@destroy')->name('departments.destroy');

    //Asset Category
    Route::resource('asset_categories', 'AssetCategoryController')->except(['create', 'show', 'destroy']);
    Route::get('asset_categories/destroy/{id}', 'AssetCategoryController@destroy')->name('asset_categories.destroy');

    //Asset
    Route::resource('room-assets', 'AssetController')->except(['create', 'show', 'destroy']);
    Route::get('room-assets/destroy/{id}', 'AssetController@destroy')->name('room-assets.destroy');

    //Maintenance Request
    Route::resource('maintenance_requests', 'MaintenanceRequestController')->except(['create', 'show', 'destroy']);
    Route::get('maintenance_requests/destroy/{id}', 'MaintenanceRequestController@destroy')->name('maintenance_requests.destroy');

    //Locations
    Route::resource('locations', 'LocationController')->except(['create', 'show', 'destroy']);
    Route::get('locations/destroy/{id}', 'LocationController@destroy')->name('locations.destroy');

});
