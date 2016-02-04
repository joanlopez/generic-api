<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function responseJSONMessage($message, $status) {
        return response()->json(array('message' => $message), $status);
    }
}
