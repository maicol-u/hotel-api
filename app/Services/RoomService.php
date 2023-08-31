<?php

namespace App\Services;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class RoomService
{

    /**
     * Crea un registro de tipo habitacion, si el tipo y acomodacion de la 
     * habitacion ya existe, retorna un excepcion
     * @param  int $hotelId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function save(Request $request): Room
    {
        try{
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
    public function findRoomsHotel(int $hotelId): Collection
    {
        $hotel = Hotel::findOrFail($hotelId);
        return $hotel->rooms()->with(["type","accommodation"])->get();
    }

    public function delete(int $id): void
    {
        $room = Room::findOrFail($id);
        $room->delete();
    }

}