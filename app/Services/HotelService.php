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

    /**
     * Verifica si al actualizar el hotel, la cantidad de habitaciones no es
     * inferior a las ya creadas
     */
    public function update(Request $request, int $id): Hotel
    {
        $hotel = Hotel::findOrFail($id);
        if($request->number_rooms < $hotel->rooms()->sum("quantity")) throw new \Exception('El numero de habitaciones es menor a las creadas');
        $hotel->update($request->all());
        return $hotel;
    }

    public function delete(int $id): void
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
    }
}
