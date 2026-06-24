<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Country;
use App\Models\Destination;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Menampilkan dashboard utama untuk user yang sudah login.
     */
    public function dashboard(): View
    {
        $countries = Country::withCount('destinations')
            ->orderBy('id')
            ->get();

        /*
         * Rekomendasi harian:
         * - Semua user mendapat rekomendasi yang sama pada hari yang sama.
         * - Rekomendasi baru berubah saat tanggal berganti.
         * - Hanya destinasi yang kuotanya masih tersedia yang ditampilkan.
         */
        $dailySeed = (int) now()->format('Ymd');

        $featuredDestinations = Destination::with('country')
            ->where('quota', '>', 0)
            ->inRandomOrder($dailySeed)
            ->take(6)
            ->get();

        $recentBookings = Booking::with(['destination.country', 'payment'])
            ->where('user_id', auth()->id())
            ->latest()
            ->take(3)
            ->get();

        return view('user.dashboard', compact(
            'countries',
            'featuredDestinations',
            'recentBookings'
        ));
    }

    /**
     * Menampilkan daftar destinasi berdasarkan negara untuk user.
     */
    public function country(Country $country): View
    {
        $country->load([
            'destinations' => function ($query) {
                $query->orderBy('name');
            }
        ]);

        return view('public.country', compact('country'));
    }

    /**
     * Menampilkan detail destinasi untuk user.
     */
    public function destination(Destination $destination): View
    {
        $destination->load('country');

        return view('public.destination', compact('destination'));
    }
}