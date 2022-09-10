<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response;

/**
 * Базовый контроллер
 *
 * Class ControllerBase
 *
 * @package App\Http\Controllers\Api
 */
abstract class ControllerBase extends Controller
{
    public function __construct()
    {
    }

    /**
     * Кастомный response
     *
     * @param  array  $response
     *
     * @param  int  $statusCode
     *
     * @return ResponseFactory|Response
     */
    public function response(array $response, $statusCode = 200)
    {
        if (!array_key_exists('status', $response) || !in_array($response['status'], ['ok', 'fail'])) {
            throw new Exception('Неверный формат статуса');
        }

        if (array_key_exists('data', $response)) {
            $data = collect($response['data'])->toArray();
        }

        if (!empty(request()->get('revert_id'))) {
            $response['revertId'] = request()->get('revert_id');
        }

        return response($response, $statusCode);
    }
}
