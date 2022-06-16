<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('functions_dates_hours', function (Blueprint $table) {
            $table->foreignId('function_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('date_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('hour_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('functions_dates_hours');
    }
};
