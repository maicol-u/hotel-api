<?php

namespace App\Services;

use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;

class TypeService 
{

    public function getAllTypes(): Collection
    {
        return $types = Type::all();
    }

}