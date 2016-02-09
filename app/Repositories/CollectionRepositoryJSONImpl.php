<?php

namespace App\Repositories;

use JsonPath\JsonObject;

class CollectionRepositoryJSONImpl implements CollectionRepository
{
    const DATA_FILENAME = 'data.json';

    const STORAGE_PATH_RELATIVE_TO_ROOT = '/../storage/app';

    private $dataFilePath;

    const DEFAULT_DATA_FILE_CONTENT = '{}';

    public function __construct()
    {
        $this->dataFilePath = $_SERVER["DOCUMENT_ROOT"] . self::STORAGE_PATH_RELATIVE_TO_ROOT . '/' . self::DATA_FILENAME;
    }

    public function getItemsOf($collection)
    {
        if(file_exists($this->dataFilePath))
        {
            $dataJSON = $this->fileGetJSON();
            $jsonObject = new JsonObject($dataJSON);
            $jsonResult = $jsonObject->get('$.' . $collection . '[*]');
            if($jsonResult)
            {
                return $jsonResult;
            }
            return [];
        } else {
            $this->initDataFile();
        }
    }

    public function initDataFile()
    {
        $dataFile = fopen($this->dataFilePath, "w");
        fwrite($dataFile, self::DEFAULT_DATA_FILE_CONTENT);
        fclose($dataFile);
    }

    /**
     * @return string
     */
    public function fileGetJSON()
    {
        $dataContent = file_get_contents($this->dataFilePath);
        $dataJSON = json_decode($dataContent);
        return $dataJSON;
    }
}