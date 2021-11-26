<?php

namespace App\Exceptions;

use Exception;
use Inertia\Inertia;
use Throwable;
use Illuminate\Support\Facades\Log;

class UserNotFoundException extends Exception
{
    public function __construct($message = "User not found !!!", $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    public function report()
    {
        Log::channel('exception')->error('Exception: User not found. Probably signed route is tempered.');
    }

    public function render()
    {
        return Inertia::render('Errors/user-not-found', [
            'message' => $this->message,
            'code' => $this->code
        ]);
    }
}
