<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::with('country')
            ->latest()
            ->get();

        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        $countries = Country::orderBy('name')->get();

        return view('admin.destinations.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'country_id' => ['required', 'exists:countries,id'],
            'name' => ['required', 'string', 'max:150', 'unique:destinations,name'],
            'location' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'adult_price' => ['required', 'numeric', 'min:0'],
            'child_price' => ['required', 'numeric', 'min:0', 'lte:adult_price'],
            'quota' => ['required', 'integer', 'min:1'],
            'image' => ['required', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'],
        ], [
            'country_id.required' => 'Negara wajib dipilih.',
            'name.required' => 'Nama destinasi wajib diisi.',
            'name.unique' => 'Nama destinasi sudah digunakan.',
            'location.required' => 'Lokasi destinasi wajib diisi.',
            'adult_price.required' => 'Harga dewasa wajib diisi.',
            'child_price.required' => 'Harga anak-anak wajib diisi.',
            'child_price.lte' => 'Harga anak-anak tidak boleh lebih besar dari harga dewasa.',
            'quota.required' => 'Kuota tiket wajib diisi.',
            'image.required' => 'Gambar destinasi wajib diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.max' => 'Ukuran gambar maksimal 5 MB.',
        ]);

        $imagePath = $request->file('image')->store('destinations', 'public');

        Destination::create([
            'country_id' => $validated['country_id'],
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'location' => $validated['location'],
            'description' => $validated['description'] ?? null,

            /*
             * Kolom price lama tetap diisi dengan harga dewasa
             * supaya halaman lama yang masih memakai price tidak error.
             */
            'price' => $validated['adult_price'],

            'adult_price' => $validated['adult_price'],
            'child_price' => $validated['child_price'],
            'quota' => $validated['quota'],
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Destinasi berhasil ditambahkan.');
    }

    public function edit(Destination $destination)
    {
        $countries = Country::orderBy('name')->get();

        return view('admin.destinations.edit', compact('destination', 'countries'));
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'country_id' => ['required', 'exists:countries,id'],
            'name' => [
                'required',
                'string',
                'max:150',
                Rule::unique('destinations', 'name')->ignore($destination->id),
            ],
            'location' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'adult_price' => ['required', 'numeric', 'min:0'],
            'child_price' => ['required', 'numeric', 'min:0', 'lte:adult_price'],
            'quota' => ['required', 'integer', 'min:1'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'],
        ], [
            'country_id.required' => 'Negara wajib dipilih.',
            'name.required' => 'Nama destinasi wajib diisi.',
            'name.unique' => 'Nama destinasi sudah digunakan.',
            'location.required' => 'Lokasi destinasi wajib diisi.',
            'adult_price.required' => 'Harga dewasa wajib diisi.',
            'child_price.required' => 'Harga anak-anak wajib diisi.',
            'child_price.lte' => 'Harga anak-anak tidak boleh lebih besar dari harga dewasa.',
            'quota.required' => 'Kuota tiket wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.max' => 'Ukuran gambar maksimal 5 MB.',
        ]);

        $imagePath = $destination->image;

        if ($request->hasFile('image')) {
            if ($destination->image) {
                Storage::disk('public')->delete($destination->image);
            }

            $imagePath = $request->file('image')->store('destinations', 'public');
        }

        $destination->update([
            'country_id' => $validated['country_id'],
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'location' => $validated['location'],
            'description' => $validated['description'] ?? null,

            /*
             * Kolom price lama tetap disamakan dengan harga dewasa.
             */
            'price' => $validated['adult_price'],

            'adult_price' => $validated['adult_price'],
            'child_price' => $validated['child_price'],
            'quota' => $validated['quota'],
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Destinasi berhasil diubah.');
    }

    public function destroy(Destination $destination)
    {
        if ($destination->bookings()->exists()) {
            return redirect()
                ->route('admin.destinations.index')
                ->with('error', 'Destinasi tidak dapat dihapus karena sudah memiliki data pemesanan.');
        }

        if ($destination->image) {
            Storage::disk('public')->delete($destination->image);
        }

        $destination->delete();

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Destinasi berhasil dihapus.');
    }
}