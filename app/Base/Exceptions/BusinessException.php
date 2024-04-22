<?php

namespace App\Base\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BusinessException extends Exception
{
    public function render(Request $request)
    {
        return response([
            'message' => $this->getMessage(),
        ], Response::HTTP_BAD_REQUEST);
    }
}
