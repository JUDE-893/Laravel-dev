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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('start_date')->useCurrent();
            $table->timestamp('end_date')->nullable();
            $table->integer('num_nights');
            $table->integer('num_guests')->nullable();
            $table->float('cabin_price', 5, 2);
            $table->float('extra_price', 5, 2)->nullable();
            $table->float('total_price', 5, 2);
            $table->string('status')->nullable();
            $table->boolean('has_breakfast')->default(false);
            $table->boolean('is_paid')->default(false);
            $table->longText('observation')->nullable(); // Corrected typo
            $table->foreignId('cabin_id')->constrained('cabins');
            $table->foreignId('guest_id')->constrained('guests');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
