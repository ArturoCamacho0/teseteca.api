<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cinemas_rooms', function (Blueprint $table) {
            $table->foreignId('cinema_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_id')->constrained()->onDelete('cascade');

            $table->timestamps();

            $table->primary(['cinema_id', 'room_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('cinemas_rooms');
    }
};
