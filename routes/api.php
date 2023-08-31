<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

# Todas las rutas para hotel
Route::resource('hotel', HotelController::class)->except(['create', 'edit']);

Route::resource('room', RoomController::class)->except(['create', 'edit', 'index']);
Route::get('hotel/{id}/rooms', [RoomController::class, 'roomsHotel']);
Route::get('type', [TypeController::class, 'index']);
Route::get('type/{id}/accommodation', [AccommodationController::class, 'getAccommodationsType']);
