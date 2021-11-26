<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use App\Exceptions\{
    LinkExpiredException,
    UserNotFoundException
};
use App\Http\Requests\PasswordChangeRequest;
use Illuminate\Support\Facades\Hash;

class FirstTimePasswordChangeController extends Controller
{
    public function change(Request $request)
    {
        // if (!$request->hasValidSignature()) {
        //     throw new LinkExpiredException(userId: $request->user);
        // }
        $user = User::find($request->user) ?? throw new UserNotFoundException;
        return Inertia::render('Auth/first-time-password', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name
            ]
        ]);
    }

    /**
     * Password change attempt
     * After validation password will be returned as associative array having 'password' as a key
     * 
     * @param PasswordChangeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function changeAttempt(PasswordChangeRequest $request)
    {
        $password = ['password' => Hash::make($request->safe()->only('password')['password'])];
        $staffId = $request->safe()->only('id');
        $user = User::find($staffId)->first() ?? throw new UserNotFoundException;

        $user->assignRole('user');
        return $user->update($password) ?
            redirect('login')->with('success', 'Password changed successfully. Now you can login.') :
            redirect()->back()->with('error', 'Unable to change password !!!.');
    }
}
