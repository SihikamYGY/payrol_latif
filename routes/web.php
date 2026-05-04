<?php

use App\Livewire\Dashboard;
use App\Livewire\Employee\Index as EmployeeIndex;
use App\Livewire\MyPayroll;
use App\Livewire\Payroll\Index as PayrollIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {

    // semua user
    if (class_exists(Dashboard::class)) {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
    }

    // ADMIN ONLY
    Route::middleware('role:admin')->group(function () {

        if (class_exists(EmployeeIndex::class)) {
            Route::get('/employee', EmployeeIndex::class)->name('employee.index');
        }

        if (class_exists(PayrollIndex::class)) {
            Route::get('/payroll', PayrollIndex::class)->name('payroll.index');
        }

    });

    // USER ONLY
    Route::middleware('role:user')->group(function () {

        if (class_exists(MyPayroll::class)) {
            Route::get('/my-payroll', MyPayroll::class)->name('my.payroll');
        }

    });

});

Route::post('/logout', function () {
    auth()->logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
