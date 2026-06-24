<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('destination_id')
                ->constrained('destinations')
                ->restrictOnDelete();

            $table->string('booking_code')->unique();
            $table->date('visit_date');

            $table->unsignedInteger('adult_ticket_quantity')->default(0);
            $table->unsignedInteger('child_ticket_quantity')->default(0);
            $table->unsignedInteger('ticket_quantity');

            $table->decimal('total_price', 12, 2);

            $table->enum('booking_status', [
                'menunggu_pembayaran',
                'aktif',
                'dibatalkan',
                'selesai'
            ])->default('menunggu_pembayaran');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};