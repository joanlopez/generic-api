<?php

namespace App\Http\Controllers;

use App\Services\CollectionService;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class CollectionController extends Controller
{
    private $collectionService;

    public function __construct(CollectionService $collectionService)
    {
        $this->collectionService = $collectionService;
    }

    public function getCollection($collection)
    {
        $collectionItems = $this->collectionService->getCollectionItems($collection);
        return response()->json(
            $collectionItems,
            SymfonyResponse::HTTP_OK
        );
    }
}
