<?php

namespace App\Repositories;

use JsonPath\JsonObject;

class FileRepositoryImpl implements FileRepository
{
    const DEFAULT_DATA_FILE_CONTENT = '{}';

    public function getJsonOf($path)
    {
        if(!file_exists($path)) {
            $this->initDataFile($path);
        }
        $dataJSON = $this->fileGetJSON($path);
        $jsonObject = new JsonObject($dataJSON);
        return $jsonObject;
    }

    private function fileGetJson($path)
    {
        $dataContent = file_get_contents($path);
        $dataJSON = json_decode($dataContent);
        return $dataJSON;
    }

    private function initDataFile($path)
    {
        $dataFile = fopen($path, "w");
        fwrite($dataFile, self::DEFAULT_DATA_FILE_CONTENT);
        fclose($dataFile);
    }
}