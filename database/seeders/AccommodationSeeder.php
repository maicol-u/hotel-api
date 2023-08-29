<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'SENCILLA'],
            ['name' => 'DOBLE'],
            ['name' => 'TRIPLE'],
            ['name' => 'CUATRUPLE'],
        ];

        Accommodation::insert($data);
    }
}
