<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'booking_id',
        'order_id',
        'transaction_id',
        'payment_type',
        'snap_token',
        'gross_amount',
        'payment_status',
        'paid_at',
        'notification_payload',
    ];

    protected $casts = [
        'gross_amount' => 'decimal:2',
        'paid_at' => 'datetime',
        'notification_payload' => 'array',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}