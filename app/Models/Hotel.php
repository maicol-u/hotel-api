<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city', 'address', 'phone', 'number_rooms', 'nit'];

    public function rooms(){
        return $this->hasMany(Room::class, 'hotel_id', 'id');
    }
}
