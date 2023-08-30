<?php

namespace App\Http\Controllers;

use App\Services\AccommodationService;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    
    public function __construct(private AccommodationService $accommodationService) {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAccommodationsType(int $id)
    {
        $types = $this->accommodationService->getAccommodationForType($id);
        return Response()->json([
            "message" => "List accommodations rooms for type",
            "data" => $types,
        ]);
    }


}
