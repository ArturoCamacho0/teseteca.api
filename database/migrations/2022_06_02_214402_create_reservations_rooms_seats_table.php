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
        Schema::create('reservations_rooms_seats', function (Blueprint $table) {
            $table->foreignId('reservation_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('room_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('seat_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations_rooms_seats');
    }
};
