<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Api extends \Codeception\Module
{
    public function seeResponseJsonArrayLengthIs($expectedLength)
    {
        $response = $this->getModule('REST')->response;
        $responseObject = json_decode($response);
        \PHPUnit_Framework_Assert::assertEquals($expectedLength, count($responseObject));
    }
}
