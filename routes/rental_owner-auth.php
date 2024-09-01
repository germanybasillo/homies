<?php

use App\Http\Controllers\Rental_Owner\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Rental_Owner\Auth\RegisteredUserController;
use App\Http\Controllers\Rental_Owner\BedAssignConntroller;
use App\Http\Controllers\Rental_Owner\ProfileController;
use App\Http\Controllers\Rental_Owner\BillController;
use App\Http\Controllers\Rental_Owner\Contentpage;
use App\Http\Controllers\Rental_Owner\RoomSelected;
use App\Http\Controllers\Rental_Owner\BedSelect;
use App\Http\Controllers\Rental_Owner\PaymentController;
use App\Http\Controllers\Rental_Owner\ReplyOwnerController;
use Illuminate\Support\Facades\Route;
use App\Models\TenantProfile;
use App\Models\Room;
use App\Models\Bed;

Route::middleware('guest:rental_owner')->prefix('rental_owner')->name('rental_owner.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth:rental_owner')->prefix('rental_owner')->name('rental_owner.')->group(function () {
    
    Route::get('/dashboard', function () {
        // Fetch the data you need
        $tenantprofiles = TenantProfile::count(); // Count the number of tenant profiles
        $rooms = Room::count(); // Count the number of rooms
        $beds = Bed::count(); // Count the number of beds
    
        // Pass the data to the view
        return view('rental_owner.dashboard', compact('tenantprofiles', 'rooms', 'beds'));
    })->middleware(['verified'])->name('dashboard');
    
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    Route::resource('/bedassigns', BedAssignConntroller::class);
    Route::post('/rental_owner/bedassign/store', [BedAssignConntroller::class, 'store'])->name('bedassign.store');
    Route::put('/rental_owner/bedassigns/{id}', [BedAssignConntroller::class, 'update'])->name('bedassigns.update');

    Route::resource('/bills', BillController::class);
    Route::post('/rental_owner/bill/store', [BillController::class, 'store'])->name('bill.store');
    Route::put('/rental_owner/bills/{id}', [BillController::class, 'update'])->name('bills.update');

    Route::resource('/selecteds', RoomSelected::class);
    Route::post('/rental_owner/selected/store', [RoomSelected::class, 'store'])->name('selected.store');
    Route::put('/rental_owner/selecteds/{id}', [RoomSelected::class, 'update'])->name('selecteds.update');

    Route::resource('/selectbeds', BedSelect::class);
    Route::post('/rental_owner/selectbed/store', [BedSelect::class, 'store'])->name('selectbed.store');
    Route::put('/rental_owner/selectbeds/{id}', [BedSelect::class, 'update'])->name('selectbeds.update');

    Route::resource('/replyowners', ReplyOwnerController::class);
    Route::post('/rental_owner/replyowner/store', [ReplyOwnerController::class, 'store'])->name('replyowner.store');
    Route::put('/rental_owner/replyowners/{id}', [ReplyOwnerController::class, 'update'])->name('replyowners.update');

    Route::get('/profile', [Contentpage::class, 'profile'])->name('profile');
    Route::get('/invoice', [Contentpage::class, 'invoice'])->name('invoice');
    Route::get('/payment', [Contentpage::class, 'payment'])->name('payment');
    Route::get('/paymenthistory', [Contentpage::class, 'paymenthistory'])->name('paymenthistory');
    Route::get('/sms', [Contentpage::class, 'sms'])->name('sms');
    Route::get('/notice', [Contentpage::class, 'notice'])->name('notice');
    Route::get('/suggestion', [Contentpage::class, 'suggestion'])->name('suggestion');
    Route::get('/income', [Contentpage::class, 'income'])->name('income');
    Route::get('/collectibles', [Contentpage::class, 'collectibles'])->name('collectibles');

});
