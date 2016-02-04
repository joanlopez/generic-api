<?php
$I = new ApiTester($scenario);
$I->wantTo('validate that test route works properly');
$I->sendGET('/test');
$I->seeResponseIsJson();
$I->seeResponseJsonMatchesJsonPath('$.message');
