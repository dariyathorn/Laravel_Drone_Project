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
        Schema::create('maps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('quality');
            $table->unsignedBigInteger("location_id");
            $table->foreign("location_id")->references("id")->on("locations")->onDelete("cascade");
            $table->unsignedBigInteger("farm_id");
            $table->foreign("farm_id")->references("id")->on("farms")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maps');
    }
};
