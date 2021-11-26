<?php

use App\Exceptions\FullPage404Exception;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\{
    DashboardController,
    FileController,
    FileOwnerController,
    StaffController
};


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
    return Inertia::render('index');
});

require_once 'ext/auth.php';

//this is for dashboard
Route::middleware(['auth'])->group(function () {
    Route::prefix('api')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'show'])->name('dashboard');
        Route::resource('files', FileController::class);
        Route::resource('file-owners', FileOwnerController::class);
        Route::resource('staffs', StaffController::class);
    });
});

Route::fallback(function () {
    throw new FullPage404Exception("Please, do not type url directly !!!", 404);
});
