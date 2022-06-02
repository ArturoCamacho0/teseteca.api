<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('functions_dates_hours', function (Blueprint $table) {
            $table->foreignId('function_id')->constrained()->onDelete('cascade');
            $table->foreignId('date_id')->constrained()->onDelete('cascade');
            $table->foreignId('hour_id')->constrained()->onDelete('cascade');

            $table->primary(['function_id', 'date_id', 'hour_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('functions_dates_hours');
    }
};
