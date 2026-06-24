<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\View\View;

class AdminBookingController extends Controller
{
    /**
     * Menampilkan seluruh pemesanan user untuk admin.
     */
    public function index(): View
    {
        $bookings = Booking::with([
                'user',
                'destination.country',
                'payment',
            ])
            ->latest()
            ->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Menampilkan detail pemesanan user untuk admin.
     */
    public function show(Booking $booking): View
    {
        $booking->load([
            'user',
            'destination.country',
            'visitors',
            'payment',
        ]);

        return view('admin.bookings.show', compact('booking'));
    }
}