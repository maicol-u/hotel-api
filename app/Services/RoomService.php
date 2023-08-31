<?php

namespace App\Services;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use NumRoomsValidation;

class RoomService
{

    public function __construct(private HotelService $hotelService, private NumRoomsValidation $numRoomsValidation)
    {
    }

    /**
     * Crea un registro de tipo habitacion, si el tipo y acomodacion de la 
     * habitacion ya existe, retorna un excepcion
     * @param  int $hotelId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function save(Request $request): Room
    {
        try{
            $this->validateRooms($request->hotel_id, $request->quantity);
            return Room::create($request->all());
        }catch(\Exception $e){
            throw $e; 
        }
    }

    /**
     * Busca las habitaciones de un hotel con sus tipos y acomodaciones
     * @param  int $hotelId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findRoomsHotel(int $hotelId)
    {
        $hotel = $this->hotelService->findById($hotelId);
        return $hotel->rooms()->with(["type","accommodation"])->get();
    }

    public function delete(int $id): void
    {
        $room = Room::findOrFail($id);
        $room->delete();
    }

    /**
     * Suma de la cantidad de habitaciones por hotel desde el modelo room
     * @param  int $hotelId
     * @return int
     */
    public function getNumRoomsForHotel(int $hotelId)
    {
        $hotel = $this->hotelService->findById($hotelId);
        return  $hotel->rooms()->sum("quantity");
    }

    public function validateRooms(int $hotelId, int $quantity): bool
    {
        $numRoomsHotel = $this->getNumRoomsForHotel($hotelId);
        $numAccepRooms = $this->hotelService->findById($hotelId)->number_rooms;
        $res = $this->numRoomsValidation->validateNumRoomsForHotel($numRoomsHotel, $quantity, $numAccepRooms);
        if(!$res) throw new \Exception('El numero de habitaciones supera las permitidas');
        return $res;
    }

}