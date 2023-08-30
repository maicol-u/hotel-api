<?php

namespace App\Models;

class TypeAccommodationData
{

    private $data = [];

    /*
        Establish data source for the adaptations, it could be a table of the data base
    */
    public function __construct()
    {
        $this->data = [
            1 => [1, 2],
            2 => [3, 4],
            3 => [1, 2, 3]
        ];
    }

    public function getAccomodationByTypeId($id)
    {
        if ($this->data[$id]) return $this->data[$id];
        else return [];
    }
}
