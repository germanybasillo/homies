<?php

use App\Http\Controllers\Tenant\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Tenant\Auth\RegisteredUserController;
use App\Http\Controllers\Tenant\TenantprofileController;
use App\Http\Controllers\Tenant\ProfileController;
use App\Http\Controllers\Tenant\Tenantpage;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:tenant')->prefix('tenant')->name('tenant.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth:tenant')->prefix('tenant')->name('tenant.')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('tenant.dashboard');
    })->middleware(['verified'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
     
   
    Route::get('/notice', [Tenantpage::class, 'notice'])->name('notice');
    Route::get('/proof', [Tenantpage::class, 'proof'])->name('proof');
    Route::get('/history', [Tenantpage::class, 'history'])->name('history');
    Route::get('/suggestion', [Tenantpage::class, 'suggestion'])->name('suggestion');


    Route::resource('/tenantprofiles', TenantprofileController::class);
    Route::post('/tenant/tenantprofile/store', [TenantprofileController::class, 'store'])->name('tenantprofile.store');
    Route::put('/tenant/tenantprofiles/{id}', [TenantProfileController::class, 'update'])->name('tenantprofiles.update');
});
