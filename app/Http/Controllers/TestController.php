<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class TestController extends Controller
{
    public function testRoute()
    {
        $testArray = ['testMessage' => 'If you are reading this, it means that it works!'];
        return $this->responseJSONMessage($testArray, SymfonyResponse::HTTP_OK);
    }
}
