<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class PasswordController extends Controller
{
    public function passwordChange()
    {
        return Inertia::render('Auth/change-password');
    }

    public function passwordChangeAttempt()
    {
        dd('here password will be changed');
    }
}
