<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;


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
        Route::get('dashboard', function () {
            return Inertia::render('Dashboard/app');
        })->name('dashboard');
    });
});
