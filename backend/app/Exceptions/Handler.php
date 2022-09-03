<?php

namespace App\Exceptions;

use App\Models\Log;
use App\Tools\Translation\Exceptions;
use App\Tools\Translation\ExceptionsTranslation;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, \Throwable $exception)
    {
        $msg = $exception->getMessage();
        $code = $exception->getCode();

        if ($msg === 'Unauthenticated.') {
            $msg = ExceptionsTranslation::getMessage(
                Exceptions::UNAUTHENTICATED
            );
            $code = Exceptions::UNAUTHENTICATED;
        }

        if (!ExceptionsTranslation::isCatalogedError($msg)) {
            $log = new Log([
                'code' => $code,
                'message' => $msg,
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);
            $log->save();

            $msg = ExceptionsTranslation::getMessage(
                Exceptions::DEFAULT_ERROR
            );
            $code = Exceptions::DEFAULT_ERROR;
        }

        return response()->json([
            'info' => 'error',
            'code' => $code,
            'message' => $msg,
        ], 400);
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
