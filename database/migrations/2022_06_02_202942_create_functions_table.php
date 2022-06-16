<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('functions', function (Blueprint $table) {
            $table->id();
            $table->float('price');

            $table->timestamps();

            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->foreignId('cinema_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('functions');
    }
};
