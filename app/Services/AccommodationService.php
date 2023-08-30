<?php

namespace App\Services;

use App\Models\Accommodation;
use App\Models\TypeAccommodationData;


class AccommodationService {

    public function __construct(private TypeAccommodationData $typeAccommodation) {
    
    }

     /**
     * Find accommodation for the specified type
     *
     * @param  int  $typeId
     * @return \Illuminate\Database\Collection
     */
    public function getAccommodationForType(int $typeId){
        $accomodationsId =  $this->typeAccommodation->getAccomodationByTypeId($typeId);
        return Accommodation::whereIn('id', $accomodationsId)->get();
    }

}