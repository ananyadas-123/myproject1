<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                  ->constrained('products')
                  ->onDelete('cascade');

            $table->string('service_type');

            $table->text('description')->nullable();

            $table->date('last_service_date')->nullable();

            $table->date('next_service_date');

            $table->decimal('estimated_cost', 10, 2)->nullable();

            $table->enum('status', [
                'scheduled',
                'completed',
                'overdue'
            ])->default('scheduled');

            $table->boolean('reminder_enabled')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};