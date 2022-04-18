<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            Log::error($this->customizedMessage($e));
        });
    }

    protected function customizedMessage(Throwable $e)
    {
        $file = Arr::last(explode("\\", $e->getFile()));
        $line = $e->getLine();
        $message = $e->getMessage();
        $trace = $e->getTraceAsString();

        return "An error happened at $file at line $line\nWith message: $message\n\n$trace";
    }
}
