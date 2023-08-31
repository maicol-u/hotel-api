<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveRoomRequest;
use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomController extends Controller
{


    public function __construct(private RoomService $roomService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roomsHotel(int $hotelId)
    {

        $data = $this->roomService->findRoomsHotel($hotelId);
        return Response()->json(["message" => "List of rooms and their types for hotel", "data" => $data]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRoomRequest $request)
    {
        try {
            $data = $this->roomService->save($request);
            return Response()->json([
                "message" => "Room was created", "data" => $data,
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create room', 'message' => $e->getMessage()], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->roomService->delete($id);
        return Response()->json([
            "message" => "Room was deleted",
        ]);
    }
}
