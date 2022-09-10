<?php


namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ResponseFormatException
 *
 * @package App\Exceptions
 */
class ResponseFormatException extends Exception
{

    /**
     * ResponseFormatException constructor.
     *
     * @param  string  $message
     * @param  int  $code
     */
    public function __construct(string $message = "Wrong response format", int $code = 500)
    {
        parent::__construct($message);
    }

    /**
     * @param $request
     *
     * @return ResponseFactory|Response
     */
    public function render($request)
    {
        return response([
            'status' => 'error',
            'data' => [
                'message' => $this->getMessage()
            ]
        ], 400);
    }

}