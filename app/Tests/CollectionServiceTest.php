<?php

use App\Services\CollectionService;

class CollectionServiceTest extends PHPUnit_Framework_TestCase
{
    public function testThatGetCollectionItemsReturnsWhichIsReturnedByTheRepository()
    {
        $expected = array(array('id' => 1), array('id' => 1));
        $collectionRepositoryMock = Mockery::mock('App\Repositories\CollectionRepository');
        $collectionRepositoryMock->shouldReceive('getItemsOf')->with('hams')->andReturn($expected);
        $collectionService = new CollectionService($collectionRepositoryMock);

        $returned = $collectionService->getCollectionItems('hams');

        $this->assertEquals($expected,$returned);

    }

}