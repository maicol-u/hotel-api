<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveRoomRequest;
use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomController extends Controller
{

    private RoomService $roomService;

    public function __construct(RoomService $roomService) {
        $this->roomService = $roomService;
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roomsHotel(int $hotelId)
    {
        $data = $this->roomService->findRoomsHotel($hotelId);
        return Response()->json([
            "message" => "List of hotels",
            "data" => $data
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRoomRequest $request)
    {
        $data = $this->roomService->save($request);
        return Response()->json([
            "message" => "Room was created",
            "data" => $data,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
