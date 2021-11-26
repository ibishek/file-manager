<?php

namespace App\Exceptions;

use Exception;
use Inertia\Inertia;
use Throwable;
use Illuminate\Support\Facades\Log;

class FullPage404Exception extends Exception
{
    public function __construct($message = "Page not found !!!", $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function report()
    {
        auth()->check() ?
            Log::channel('exception')->warning('Error: 404 not found. Looks like ' . auth()->user()->name . ' is doing some heavy work.') :
            Log::channel('exception')->info('Error: 404 page not found');
    }

    public function render()
    {
        return Inertia::render('Errors/404', [
            'message' => $this->message,
            'code' => $this->code
        ]);
    }
}
