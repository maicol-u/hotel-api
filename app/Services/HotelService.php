<?php

namespace App\Services;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class HotelService
{

    public function save(Request $request): Hotel
    {
        return Hotel::create($request->all());
    }

    public function getAll(): Collection
    {
        return Hotel::all();
    }

    
    public function findById(int $id): Hotel
    {
        return Hotel::findOrFail($id);
    }

    public function update(Request $request, int $id): Hotel
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());
        return $hotel;
    }

    public function delete(int $id): void
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
    }
}
