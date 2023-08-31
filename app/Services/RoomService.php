<?php

namespace App\Services;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class RoomService
{

    public function save(Request $request): Room
    {
        return Room::create($request->all());

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

}