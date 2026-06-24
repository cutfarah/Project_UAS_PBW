<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Payment;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $countryCount = Country::count();
        $destinationCount = Destination::count();
        $bookingCount = Booking::count();
        $userCount = User::where('role', 'user')->count();

        $paidBookingCount = Payment::where('payment_status', 'paid')->count();
        $pendingBookingCount = Booking::where('booking_status', 'menunggu_pembayaran')->count();

        $totalRevenue = Payment::where('payment_status', 'paid')
            ->sum('gross_amount');

        $latestBookings = Booking::with([
                'user',
                'destination',
                'payment',
            ])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'countryCount',
            'destinationCount',
            'bookingCount',
            'userCount',
            'paidBookingCount',
            'pendingBookingCount',
            'totalRevenue',
            'latestBookings'
        ));
    }
}