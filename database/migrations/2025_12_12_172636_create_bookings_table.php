<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id'); // FK to users
            $table->unsignedBigInteger('vehicle_id');  // FK to vehicles
            $table->unsignedBigInteger('voucher_id')->nullable(); // optional voucher
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->decimal('duration_hours', 5, 2);
            $table->decimal('total_amount', 10, 2);
            $table->decimal('deposit_amount', 10, 2)->nullable();
            $table->string('drop_off_location')->nullable();
            $table->decimal('delivery_charge', 10, 2)->default(0);
            $table->enum('status', ['pending','confirmed','completed','cancelled'])->default('pending');
            $table->timestamps();

            // Foreign keys
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
}
