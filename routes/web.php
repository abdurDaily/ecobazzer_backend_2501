<?php

use App\Http\Controllers\Backend\MyProfile\MyProfileController;
use App\Http\Controllers\Backend\RolePermission\RolePermissionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//* BACKEND ROUTES 
Route::prefix('dashboard/')->name('dashboard.')->middleware(['auth', 'verified'])->group(function(){
    
    
    //* MY PROFILE ROUTES 
    Route::get('my-profile', [MyProfileController::class,'view'])->name('my.profile.view');
    Route::post('my-profile-info', [MyProfileController::class,'profileInfo'])->name('my.profile.info');
    Route::post('my-profile-password', [MyProfileController::class,'profilePassword'])->name('my.profile.password');
    Route::post('my-profile-image', [MyProfileController::class,'profileImage'])->name('my.profile.image');
    
    
    //* ROLE AND PERMISSION 
    Route::prefix('role-permission/')->middleware('can:delete')->name('rolePermission.')->group(function(){
        Route::get('create-user', [RolePermissionController::class,'createUser'])->name('create.user');
        Route::post('create-user', [RolePermissionController::class,'storeUser'])->name('store.user');
        Route::get('list-users', [RolePermissionController::class,'listUsers'])->name('list.users');
        Route::get('edit-users/{id}', [RolePermissionController::class,'editUsers'])->name('edit.user');
        Route::get('delete/{id}', [RolePermissionController::class,'deleteUser'])->name('delete.user');
        Route::put('update-users/{id}', [RolePermissionController::class,'updateUser'])->name('update.user');
        Route::get('create-role', [RolePermissionController::class,'createRole'])->name('create.role');
        Route::post('create-role', [RolePermissionController::class,'createRoleStore'])->name('create.role.store');
        Route::post('role-list', [RolePermissionController::class,'roleListStore'])->name('role.list.store');
        Route::get('role-list/{id}', [RolePermissionController::class,'roleList'])->name('role.list');
        Route::get('all-roles', [RolePermissionController::class,'allRoles'])->name('roles.all');
        Route::get('permissions/{id}', [RolePermissionController::class,'permissions'])->name('permissions');
        Route::post('permissions', [RolePermissionController::class,'permissionsStore'])->name('permissions.store');
    });


});



//* FRONTEND ROUTES 

require __DIR__.'/auth.php';
