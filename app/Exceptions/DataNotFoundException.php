<?php

namespace App\Exceptions;

use App\Helpers\ResponseHelper;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class DataNotFoundException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
//        $this->render();
    }

    public function report()
    {
        //
    }

    public function render($request)
    {
        return ResponseHelper::json(false, 404);
    }
}
