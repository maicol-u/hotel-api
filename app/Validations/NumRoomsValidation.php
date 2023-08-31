<?php

namespace App\Validations;

class NumRoomsValidation
{

    /**
     * Valida que el numero de habitaciones no supere el numero establecido por hotel
     * 
     * @param  int $numRoomsHotel
     * @param  int $quantity
     * @param  int $numAccepRooms
     * 
     * @return bool
     */
    public function validateNumRoomsForHotel($numRoomsHotel, $quantity, $numAccepRooms)
    {
        if ($numRoomsHotel + $quantity <= $numAccepRooms) return true;
        else return false;
    }
}
