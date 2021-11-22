<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private const DASHBOARD = 'api/dashboard';
    public function login()
    {
        return auth()->check() ?
            redirect()->intended(self::DASHBOARD) :
            Inertia::render('Auth/login');
    }

    public function loginAttempt(Request $request)
    {
        $request->validate([
            'email' => ['bail', 'required', 'email'],
            'password' => ['required']
        ]);
        $userCredentials = $this->credentialsHelper($request);
        if (Auth::attempt($userCredentials)) {
            $request->session()->regenerate();
            return redirect()->intended(self::DASHBOARD);
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match with our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/');
    }

    private function credentialsHelper($request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'is_active' => '1'
        ];
    }
}
