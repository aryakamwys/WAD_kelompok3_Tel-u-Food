<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::latest()->paginate(10);
        return view('admin.restaurants.index', compact('restaurants'));
    }

    public function create()
    {
        return view('admin.restaurants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'address' => 'required'
        ]);

        $imagePath = $request->file('image')->store('restaurants', 'public');
        $validated['image'] = $imagePath;

        Restaurant::create($validated);
        return redirect()->route('admin.restaurants.index')->with('success', 'Restoran berhasil ditambahkan');
    }
} 