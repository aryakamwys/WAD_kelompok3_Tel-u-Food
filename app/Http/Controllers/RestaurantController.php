<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::latest()->get();
        return view('restaurants.index', compact('restaurants'));
    }

    public function create()
    {
        return view('restaurants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'opening_hours' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            if (!file_exists(storage_path('app/public/restaurants'))) {
                mkdir(storage_path('app/public/restaurants'), 0777, true);
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(storage_path('app/public/restaurants'), $fileName);
            }

            Restaurant::create([
                'name' => $request->name,
                'description' => $request->description,
                'address' => $request->address,
                'phone' => $request->phone,
                'opening_hours' => $request->opening_hours,
                'image' => $fileName
            ]);

            return redirect()->route('restaurants.index')
                ->with('success', 'Restaurant berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function edit(Restaurant $restaurant)
    {
        return view('restaurants.edit', compact('restaurant'));
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'opening_hours' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $data = $request->except('image');

            if ($request->hasFile('image')) {
                // Hapus file lama
                $oldImagePath = storage_path('app/public/restaurants/' . $restaurant->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // Upload file baru
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(storage_path('app/public/restaurants'), $fileName);

                $data['image'] = $fileName;
            }

            $restaurant->update($data);

            return redirect()->route('restaurants.index')
                ->with('success', 'Restaurant berhasil diperbarui');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function destroy(Restaurant $restaurant)
    {
        try {
            // Hapus file gambar
            $imagePath = storage_path('app/public/restaurants/' . $restaurant->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $restaurant->delete();

            return redirect()->route('restaurants.index')
                ->with('success', 'Restaurant berhasil dihapus');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error: ' . $e->getMessage()]);
        }
    }
}
