<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Models\Hotel;
use App\Services\HotelService;
use Illuminate\Http\Response as HttpResponse;

class HotelController extends Controller
{
    private HotelService $hotelService;

    public function __construct(HotelService $hotelService) {
        $this->hotelService = $hotelService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->hotelService->getAll();
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
    public function store(SaveHotelRequest $request)
    {
        $data = $this->hotelService->save($request);
        return Response()->json([
            "message" => "Hotel was created",
            "data" => $data
        ], HttpResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $hotel = $this->hotelService->findById($id);
        return Response()->json([
            "message" => "Hotel Found",
            "data" => $hotel
        ]);
    }

     /**
     * busca el hotel, sus habitaciones y los tipos y acomodaciones de las habitaciones
     * @param  int $hotel
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function showWhithRoomsTypes(int $id) {
        $hotel = $this->hotelService->findWithTypeAndAccommodation($id);
        return Response()->json([
            "message" => "Hotel with its rooms, room types and room accommodation",
            "data" => $hotel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHotelRequest $request, int $id)
    {
        $data = $this->hotelService->update($request, $id);
        return Response()->json([
            "message" => "Hotel updated",
            "data" => $data,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->hotelService->delete($id);
        return Response()->json([
            "message" => "Hotel was deleted"
        ]);
    }
}
