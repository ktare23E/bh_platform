<?php

use App\Models\Amenities;
use App\Models\BoardingHouse;
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
        Schema::create('boarding_house_amenities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Amenities::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(BoardingHouse::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boarding_house_amenities');
    }
};
