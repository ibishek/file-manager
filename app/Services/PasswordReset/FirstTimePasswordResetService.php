<?php

namespace App\Services\PasswordReset;

use DB;
use Illuminate\Support\Facades\Config;
use App\Models\User;
use App\Mail\StaffFirstTimePasswordResetMail;
use Exception;
use Illuminate\Support\Facades\{
    URL,
    Hash,
    Mail
};

class FirstTimePasswordResetService
{
    public function onPasswordReset($values)
    {
        $values = array_merge($values, array(
            'password' => Hash::make(Config::get('const.password', 'aaaa')),
            'is_active' => '0'
        ));
        try {
            DB::beginTransaction();
            $user = User::create($values);
            $url = $this->prepareUrl($user);
            Mail::to($values['email'])->send(new StaffFirstTimePasswordResetMail($user, $url));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
        return true;
    }

    private function prepareUrl($user)
    {
        return URL::temporarySignedRoute(
            'password-reset',
            now()->addMinutes(30),
            ['user' => $user]
        );
    }
}
