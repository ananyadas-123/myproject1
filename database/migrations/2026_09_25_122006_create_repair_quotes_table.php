<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('repair_quotes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('repair_request_id')
                ->constrained('repair_requests')
                ->onDelete('cascade');

            $table->foreignId('technician_id')
                ->constrained('technicians')
                ->onDelete('cascade');

            $table->decimal('estimated_cost', 10, 2);

            $table->text('description')->nullable();

            $table->date('estimated_completion_date')->nullable();

            $table->enum('status', [
                'pending',
                'accepted',
                'rejected',
            ])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('repair_quotes');
    }
};