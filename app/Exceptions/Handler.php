<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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

        // $this->renderable(function (NotFoundHttpException $e , $request){
        //     if($request->wantsJson()){
        //         return response()->json([
        //             'status' => false,
        //             'message' => 'صفحه مورد نظر یافت نشد',
        //         ],404);
        //     }
        // });

        // $this->renderable(function (QueryException $e , $request){
        //     if($request->wantsJson()){
        //         return response()->json([
        //             'status' => false,
        //             'message' => 'ارور سرور',
        //         ],500);
        //     }
        // });

        $this->reportable(function (Throwable $e) {

        });
    }

    // public function render($request, Throwable $e)
    // {

    //     if($request->wantsJson())
    //     {
    //         $exception = $this->prepareException($e);
    //         $code = method_exists($exception,'getStatusCode') ? $exception->getStatusCode() : 500;

    //         return response([
    //             'message' => $code==500 ? 'error server' : $exception->getMessage()
    //         ],$code);
    //     }

    // }

    // public function render($request, Throwable $e)
    // {
    //     $exception = $this->prepareException($e);
    //     if($exception instanceof NotFoundHttpException){

    //        return response([
    //             'message' => 'http not found'
    //         ]);
    //     }
    //     return parent::render($request, $e);
    // }
}
