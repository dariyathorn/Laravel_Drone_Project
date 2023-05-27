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
        Schema::create('plan_drones', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->unsignedBigInteger("plan_id");
            $table->foreign("plan_id")->references("id")->on("plans")->onDelete("cascade");
            $table->unsignedBigInteger("drone_id");
            $table->foreign("drone_id")->references("id")->on("drones")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_drones');
    }
};
