<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('booking_id')
                ->unique()
                ->constrained('bookings')
                ->cascadeOnDelete();

            $table->string('order_id')->unique();
            $table->string('transaction_id')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('snap_token')->nullable();
            $table->decimal('gross_amount', 12, 2);

            $table->enum('payment_status', [
                'pending',
                'paid',
                'failed',
                'expired',
                'cancelled'
            ])->default('pending');

            $table->timestamp('paid_at')->nullable();
            $table->json('notification_payload')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};