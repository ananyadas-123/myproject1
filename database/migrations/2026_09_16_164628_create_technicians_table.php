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
        Schema::create('technicians', function (Blueprint $table) {
        $table->id();

        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone');
        $table->text('address')->nullable();

        $table->string('specialization')->nullable();
        $table->text('experience')->nullable();

        $table->decimal('service_charge', 10, 2)->nullable();

        $table->string('profile_image')->nullable();

        $table->boolean('verified')->default(false);
        $table->boolean('available')->default(true);

        $table->decimal('rating', 3, 2)->default(0);

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technicians');
    }
};
