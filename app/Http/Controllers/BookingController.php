<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Destination;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index(): View
    {
        $bookings = Booking::with(['destination.country', 'payment'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.bookings.index', compact('bookings'));
    }

    public function create(Destination $destination): View
    {
        $destination->load('country');

        return view('user.bookings.create', compact('destination'));
    }

    public function store(Request $request, Destination $destination): RedirectResponse
    {
        $validated = $request->validate([
            'visit_date' => ['required', 'date', 'after_or_equal:today'],

            // Dewasa boleh 0
            'adult_ticket_quantity' => ['required', 'integer', 'min:0', 'max:20'],

            // Anak-anak juga boleh 0
            'child_ticket_quantity' => ['required', 'integer', 'min:0', 'max:20'],

            'adult_visitor_names' => ['nullable', 'array'],
            'adult_visitor_names.*' => ['nullable', 'string', 'max:100'],

            'child_visitor_names' => ['nullable', 'array'],
            'child_visitor_names.*' => ['nullable', 'string', 'max:100'],
        ], [
            'visit_date.required' => 'Tanggal kunjungan wajib dipilih.',
            'visit_date.date' => 'Tanggal kunjungan tidak valid.',
            'visit_date.after_or_equal' => 'Tanggal kunjungan tidak boleh sebelum hari ini.',

            'adult_ticket_quantity.required' => 'Jumlah tiket dewasa wajib diisi. Isi 0 jika tidak memesan tiket dewasa.',
            'adult_ticket_quantity.integer' => 'Jumlah tiket dewasa harus berupa angka.',
            'adult_ticket_quantity.min' => 'Jumlah tiket dewasa tidak boleh kurang dari 0.',
            'adult_ticket_quantity.max' => 'Jumlah tiket dewasa maksimal 20.',

            'child_ticket_quantity.required' => 'Jumlah tiket anak-anak wajib diisi. Isi 0 jika tidak memesan tiket anak-anak.',
            'child_ticket_quantity.integer' => 'Jumlah tiket anak-anak harus berupa angka.',
            'child_ticket_quantity.min' => 'Jumlah tiket anak-anak tidak boleh kurang dari 0.',
            'child_ticket_quantity.max' => 'Jumlah tiket anak-anak maksimal 20.',

            'adult_visitor_names.array' => 'Data nama pengunjung dewasa tidak valid.',
            'adult_visitor_names.*.string' => 'Nama pengunjung dewasa harus berupa teks.',
            'adult_visitor_names.*.max' => 'Nama pengunjung dewasa maksimal 100 karakter.',

            'child_visitor_names.array' => 'Data nama pengunjung anak-anak tidak valid.',
            'child_visitor_names.*.string' => 'Nama pengunjung anak-anak harus berupa teks.',
            'child_visitor_names.*.max' => 'Nama pengunjung anak-anak maksimal 100 karakter.',
        ]);

        $adultQuantity = (int) $validated['adult_ticket_quantity'];
        $childQuantity = (int) $validated['child_ticket_quantity'];
        $totalQuantity = $adultQuantity + $childQuantity;

        if ($totalQuantity < 1) {
            return back()
                ->withErrors([
                    'ticket_quantity' => 'Minimal harus memesan 1 tiket, boleh dewasa saja atau anak-anak saja.',
                ])
                ->withInput();
        }

        if ($totalQuantity > 20) {
            return back()
                ->withErrors([
                    'ticket_quantity' => 'Total tiket maksimal 20 dalam satu pemesanan.',
                ])
                ->withInput();
        }

        $adultVisitorNames = $validated['adult_visitor_names'] ?? [];
        $childVisitorNames = $validated['child_visitor_names'] ?? [];

        $adultVisitorNames = array_values(array_filter($adultVisitorNames, function ($name) {
            return trim((string) $name) !== '';
        }));

        $childVisitorNames = array_values(array_filter($childVisitorNames, function ($name) {
            return trim((string) $name) !== '';
        }));

        if (count($adultVisitorNames) !== $adultQuantity) {
            return back()
                ->withErrors([
                    'adult_visitor_names' => 'Jumlah nama pengunjung dewasa harus sama dengan jumlah tiket dewasa.',
                ])
                ->withInput();
        }

        if (count($childVisitorNames) !== $childQuantity) {
            return back()
                ->withErrors([
                    'child_visitor_names' => 'Jumlah nama pengunjung anak-anak harus sama dengan jumlah tiket anak-anak.',
                ])
                ->withInput();
        }

        $booking = DB::transaction(function () use (
            $destination,
            $validated,
            $adultQuantity,
            $childQuantity,
            $totalQuantity,
            $adultVisitorNames,
            $childVisitorNames
        ) {
            $lockedDestination = Destination::lockForUpdate()->findOrFail($destination->id);

            if ($totalQuantity > $lockedDestination->quota) {
                throw ValidationException::withMessages([
                    'ticket_quantity' => 'Jumlah tiket melebihi kuota yang tersedia.',
                ]);
            }

            $adultPrice = $lockedDestination->adult_price ?? $lockedDestination->price ?? 0;
            $childPrice = $lockedDestination->child_price ?? round(($lockedDestination->price ?? 0) * 0.75);

            $totalPrice = ($adultPrice * $adultQuantity) + ($childPrice * $childQuantity);

            $booking = Booking::create([
                'user_id' => auth()->id(),
                'destination_id' => $lockedDestination->id,
                'booking_code' => 'DST-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6)),
                'visit_date' => $validated['visit_date'],
                'adult_ticket_quantity' => $adultQuantity,
                'child_ticket_quantity' => $childQuantity,
                'ticket_quantity' => $totalQuantity,
                'total_price' => $totalPrice,
                'booking_status' => 'menunggu_pembayaran',
            ]);

            foreach ($adultVisitorNames as $visitorName) {
                $booking->visitors()->create([
                    'visitor_name' => trim($visitorName),
                    'age_category' => 'dewasa',
                ]);
            }

            foreach ($childVisitorNames as $visitorName) {
                $booking->visitors()->create([
                    'visitor_name' => trim($visitorName),
                    'age_category' => 'anak',
                ]);
            }

            return $booking;
        });

        return redirect()
            ->route('bookings.show', $booking)
            ->with('success', 'Pemesanan berhasil dibuat. Silakan lanjutkan ke pembayaran.');
    }

    public function show(Booking $booking): View
    {
        $this->authorizeBookingAccess($booking);

        $booking->load(['destination.country', 'visitors', 'payment']);

        return view('user.bookings.show', compact('booking'));
    }

    private function authorizeBookingAccess(Booking $booking): void
    {
        $user = auth()->user();

        if ($booking->user_id !== $user->id && $user->role !== 'admin') {
            abort(403, 'Kamu tidak memiliki akses ke pesanan ini.');
        }
    }
}