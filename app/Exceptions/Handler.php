<?php

namespace App\Exceptions;

use Exception;
use http\Exception\BadMethodCallException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
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
		if ($request->wantsJson()) {
			$exception=$this->prepareException($exception);
			if ($exception instanceof validationException) {
				return $this->renderValidationException($exception);
			}elseif($exception instanceof AuthenticationException){
				return $this->renderAuthenticationException($exception);
			}
			return $this->renderOtherException($exception);
		}
        return parent::render($request, $exception);
    }

	/**
	 * @param Exception $exception
	 * @return \Illuminate\Http\JsonResponse
	 */
	private function renderValidationException(Exception $exception): \Illuminate\Http\JsonResponse
	{
		return response()
			->json([
				"messages " => $exception->getMessage() ,
				"errors " => $exception->errors()
			] , 422);
	}

	/**
	 * @param Exception $exception
	 * @return \Illuminate\Http\JsonResponse
	 */
	private function renderOtherException(Exception $exception): \Illuminate\Http\JsonResponse
	{
		$code = method_exists($exception , 'getStatusCode') ? $exception->getStatusCode() : 500;
		$msg=[
			500 => "problem is occurred for server!...",
			404 => "your request is wrong or we cant found it!...",
		];
		return response()
			->json(["errors" =>$msg[$code]] , $code);
	}

	/**
	 * @param Exception $exception
	 * @return \Illuminate\Http\JsonResponse
	 */
	private function renderAuthenticationException(Exception $exception): \Illuminate\Http\JsonResponse
	{
		return response()
			->json(["error" => $exception->getMessage()] , 401);
	}
}
