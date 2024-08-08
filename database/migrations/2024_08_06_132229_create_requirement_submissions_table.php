<?php

use App\Models\BoardingHouse;
use App\Models\Requirement;
use App\Models\User;
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
        Schema::create('requirement_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(BoardingHouse::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Requirement::class)->constrained()->onDelete('cascade');
            $table->timestamp('submitted_at')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirement_submissions');
    }
};
