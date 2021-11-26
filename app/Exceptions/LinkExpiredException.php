<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class LinkExpiredException extends Exception
{
    private int $userId;
    public function __construct($message = "Link expired contact admin for support.", $code = 410, Throwable $previous = null, $userId = null)
    {
        $this->userId = $userId;
        parent::__construct($message, $code, $previous);
    }

    public function report()
    {
        Log::channel('exception')->warning('Signed route expired for a new user having id of ' . $this->userId);
    }

    public function render()
    {
        return Inertia::render('Errors/link-expired', [
            'message' => $this->message,
            'code' => $this->code
        ]);
    }
}
