<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * @see ResponseHelper::sendSuccessResponse
     */
    public function sendSuccessResponse(mixed $data, string $message = '', int $code = 200)
    {
        return ResponseHelper::sendSuccessResponse($data, $message, $code);
    }

    /**
     * @see ResponseHelper::sendErrorResponse
     */
    public function sendErrorResponse(string $message, mixed $errors = null, int $code = 500)
    {
        return ResponseHelper::sendErrorResponse($message, $errors, $code);
    }

}
