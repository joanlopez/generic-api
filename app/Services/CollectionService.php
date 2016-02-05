<?php

namespace App\Services;


use App\Repositories\CollectionRepository;

class CollectionService
{

    private $collectionRepository;

    public function __construct(CollectionRepository $collectionRepository)
    {
        $this->collectionRepository = $collectionRepository;
    }


    public function getCollectionItems($collection) {
        $itemsOf = $this->collectionRepository->getItemsOf($collection);
        return $itemsOf;
    }
}