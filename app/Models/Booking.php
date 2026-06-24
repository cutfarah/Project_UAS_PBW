<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'destination_id',
        'booking_code',
        'visit_date',
        'adult_ticket_quantity',
        'child_ticket_quantity',
        'ticket_quantity',
        'total_price',
        'booking_status',
    ];

    protected $casts = [
        'visit_date' => 'date',
        'adult_ticket_quantity' => 'integer',
        'child_ticket_quantity' => 'integer',
        'ticket_quantity' => 'integer',
        'total_price' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function visitors(): HasMany
    {
        return $this->hasMany(Visitor::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}