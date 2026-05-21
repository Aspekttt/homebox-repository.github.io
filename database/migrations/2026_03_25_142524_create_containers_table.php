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
        Schema::create('containers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("residential_complex_id")->constrained("residential_complexes")->onDelete('cascade');
            $table->string("number", 55);
            $table->string("size_category", 55);
            $table->decimal("area", 10, 2);
            $table->decimal("volume", 10, 2);
            $table->string("floor_or_location", 55);
            $table->string("description", 400);
            $table->string("image", 55);
            $table->decimal("daily_price", 10, 2);
            $table->string("status", 55);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('containers');
    }
};
