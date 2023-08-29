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
        $room = Room::create($request->all());
        return $room;
    }

    public function findRoomsHotel(int $hotelId): Collection
    {
        $hotel = Hotel::find($hotelId);
        return $hotel->rooms()->get();
    }

}