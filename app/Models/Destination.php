<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    protected $fillable = [
        'country_id',
        'name',
        'slug',
        'location',
        'description',
        'price',
        'adult_price',
        'child_price',
        'quota',
        'image',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'adult_price' => 'decimal:2',
        'child_price' => 'decimal:2',
        'quota' => 'integer',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}