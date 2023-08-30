<?php

namespace App\Http\Controllers;

use App\Services\TypeService;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function __construct(private TypeService $typeService) {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = $this->typeService->getAllTypes();
        return Response()->json([
            "message" => "List of rooms types",
            "data" => $types,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


}
