<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        if (app()->bound('sentry') && $this->shouldReport($exception)) {
            app('sentry')->captureException($exception);
        }
        
        // parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        $local = (config('app.env') == 'local') ? 1 : 0;
        $notfound = $exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
        if (!$local && !$notfound) {
            $raw = [
              'seq'  => config('request_seq'),
              'env'  => 'dev',
              'url'  => $request->path(),
              'file' => $exception->getFile(),
              'line' => $exception->getLine(),
              'msg'  => $exception->getMessage(),
              'project'  => 'aiadmin',
              'position' => 'backend',
            ];
            $data = json_encode($raw);
            \Log::info($data);
            die;
        }

        return parent::render($request, $exception);
    }
}
