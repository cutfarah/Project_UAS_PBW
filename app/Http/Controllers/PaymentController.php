<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function create(Booking $booking): View
    {
        $this->authorizeBookingAccess($booking);

        $booking->load(['destination.country', 'visitors', 'payment']);

        return view('user.payments.create', compact('booking'));
    }

    public function store(Request $request, Booking $booking): RedirectResponse
    {
        $this->authorizeBookingAccess($booking);

        $validated = $request->validate([
            'payment_method' => ['required', 'in:DANA,GoPay,QRIS'],
        ], [
            'payment_method.required' => 'Metode pembayaran wajib dipilih.',
            'payment_method.in' => 'Metode pembayaran tidak valid.',
        ]);

        $booking->load(['destination', 'payment']);

        $orderId = $booking->payment?->order_id
            ?? 'PAY-' . now()->format('YmdHis') . '-' . $booking->id;

        $transactionId = $booking->payment?->transaction_id
            ?? 'TRX-' . strtoupper(Str::random(10));

        Payment::updateOrCreate(
            [
                'booking_id' => $booking->id,
            ],
            [
                'order_id' => $orderId,
                'transaction_id' => $transactionId,
                'payment_type' => $validated['payment_method'],
                'snap_token' => null,
                'gross_amount' => $booking->total_price,
                'payment_status' => 'paid',
                'paid_at' => now(),
                'notification_payload' => [
                    'payment_method' => $validated['payment_method'],
                    'booking_code' => $booking->booking_code,
                    'paid_from' => 'Destigo payment page',
                ],
            ]
        );

        if ($booking->booking_status !== 'aktif') {
            $booking->update([
                'booking_status' => 'aktif',
            ]);

            if ($booking->destination && $booking->ticket_quantity > 0) {
                $booking->destination->decrement('quota', $booking->ticket_quantity);
            }
        }

        return redirect()
            ->route('payments.success', $booking)
            ->with('success', 'Pembayaran berhasil. E-ticket sudah aktif.');
    }

    public function success(Booking $booking): View
    {
        $this->authorizeBookingAccess($booking);

        $booking->load(['destination.country', 'visitors', 'payment']);

        return view('user.payments.success', compact('booking'));
    }

    private function authorizeBookingAccess(Booking $booking): void
    {
        $user = auth()->user();

        if ($booking->user_id !== $user->id && $user->role !== 'admin') {
            abort(403, 'Kamu tidak memiliki akses ke pesanan ini.');
        }
    }
}