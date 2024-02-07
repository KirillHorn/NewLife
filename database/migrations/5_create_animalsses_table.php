<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animalsses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status')->references('id')->on('statusses');
            $table->foreignId('users')->references('id')->on('users');
            $table->foreignId('breed_id')->references('id')->on('breeds');
            $table->string('description');
            $table->string('name_animals')->nullable();
            $table->date('date_location');
            $table->string('region');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animalsses');
    }
};
