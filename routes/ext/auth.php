<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    Auth\AuthController,
    Auth\PasswordController,
    Auth\FirstTimePasswordChangeController
};

Route::get('/staff/password-reset', [FirstTimePasswordChangeController::class, 'change'])->name('password-reset');
Route::put('/staff/password-reset', [FirstTimePasswordChangeController::class, 'changeAttempt']);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginAttempt']);
Route::post('login/dev', function () {
    if (App::environment('local')) {
        Auth::login(User::first());
        return redirect()->intended('api/dashboard');
    }
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('password/change', [PasswordController::class, 'passwordChange']);
        Route::post('password/change', [PasswordController::class, 'passwordChangeAttempt']);
    });
});
