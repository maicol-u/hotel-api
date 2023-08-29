<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# Todas las rutas para hotel
Route::resource('hotel', HotelController::class)->except(['create', 'edit']);
Route::resource('room', RoomController::class)->except(['create', 'edit', 'index']);
Route::get('hotel/{id}/rooms', [RoomController::class, 'roomsHotel']);