<?php

$I = new ApiTester($scenario);
$I->wantTo('perform that when GET a non-existing collection it returns an empty array');
$I->sendGET('/hams');
$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson([]);

$I = new ApiTester($scenario);
$I->wantTo('perform that when GET an existing collection it returns a non-empty array');
$I->sendGET('/potatoes');
$I->seeResponseCodeIs(200);
$I->seeResponseJsonArrayLengthIs(3);
