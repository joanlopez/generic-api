<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class TestController extends Controller
{
    public function testRoute()
    {
        return $this->responseJSONMessage(
            'If you are reading this, it means that it works!',
            SymfonyResponse::HTTP_OK
        );
    }
}
