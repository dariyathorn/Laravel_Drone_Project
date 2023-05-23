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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->dateTime('date_time');
            $table->string('area');
            $table->integer('density');
            $table->unsignedBigInteger('user_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->unsignedBigInteger('location_id')->references('id')->on('locations')
            ->onDelete('cascade');
            $table->unsignedBigInteger('drone_id')->references('id')->on('drones')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
