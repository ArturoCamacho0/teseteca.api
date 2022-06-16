<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->float('total');
            $table->timestamps();

            $table->foreignId('reservation_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
