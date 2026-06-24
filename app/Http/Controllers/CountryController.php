<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::withCount('destinations')
            ->latest()
            ->get();

        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:countries,name'],
            'description' => ['nullable', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        $imagePath = $request->file('image')->store('countries', 'public');

        Country::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.countries.index')
            ->with('success', 'Negara berhasil ditambahkan.');
    }

    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('countries', 'name')->ignore($country->id),
            ],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        $imagePath = $country->image;

        if ($request->hasFile('image')) {
            if ($country->image) {
                Storage::disk('public')->delete($country->image);
            }

            $imagePath = $request->file('image')->store('countries', 'public');
        }

        $country->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.countries.index')
            ->with('success', 'Negara berhasil diubah.');
    }

    public function destroy(Country $country)
    {
        if ($country->destinations()->exists()) {
            return redirect()
                ->route('admin.countries.index')
                ->with('error', 'Negara tidak dapat dihapus karena masih memiliki destinasi wisata.');
        }

        if ($country->image) {
            Storage::disk('public')->delete($country->image);
        }

        $country->delete();

        return redirect()
            ->route('admin.countries.index')
            ->with('success', 'Negara berhasil dihapus.');
    }
}