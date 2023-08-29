<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('accommodation_id');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('accommodation_id')->references('id')->on('accommodations');

            $table->unique(['hotel_id', 'type_id', 'accommodation_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
