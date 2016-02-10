<?php

namespace App\Repositories;

class CollectionRepositoryJSONImpl implements CollectionRepository
{
    const STORAGE_PATH_RELATIVE_TO_ROOT = '/../storage/app';

    const DATA_FILENAME = 'data.json';

    private $dataFilePath;
    private $fileRepository;

    public function __construct(FileRepository $fileRepository)
    {
        $this->dataFilePath = $_SERVER["DOCUMENT_ROOT"] . self::STORAGE_PATH_RELATIVE_TO_ROOT . '/' . self::DATA_FILENAME;
        $this->fileRepository = $fileRepository;
    }

    public function getItemsOf($collection)
    {
        //TODO: Think if it must return a string
        $jsonObject = $this->fileRepository->getJsonOf($this->dataFilePath);
        $jsonResult = $jsonObject->get('$.' . $collection . '[*]');
        if($jsonResult)
        {
            return $jsonResult;
        }
        return [];
    }

}