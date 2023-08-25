<?php

namespace App\Exceptions;

use App\Const\GlobalConst;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
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
            //
        });

        $this->renderable(
            function (Throwable $e, $request) {
                $response['status'] = GlobalConst::STATUS_ERROR;

                if ($e instanceof UnauthorizedHttpException) {
                    $response['error'] = [
                        'code' => Response::HTTP_UNAUTHORIZED,
                        'message' =>  'Unauthorized'
                    ];
                    Log::debug('UnauthorizedHttpException ', $response);
                } else {
                    $response['error'] = [
                        'code' => GlobalConst::STATUS_ERROR,
                        'message' =>  $e->getMessage()
                    ];
                    Log::debug('Error ', $response);
                }

                return response()->json($response);
            }
        );
    }
}
// 159
