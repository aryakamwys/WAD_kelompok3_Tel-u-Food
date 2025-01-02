<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Menu::whereHas('category', function ($query) {
            $query->where('name', 'Food');
        })->with(['restaurant', 'category'])->latest()->get();

        return view('foods.index', compact('foods'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        return view('foods.create', compact('restaurants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required|integer|min:0', // Validasi stok

        ]);

        // Simpan dengan category_id food
        $category = Category::where('name', 'Food')->first();

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(storage_path('app/public/menus'), $fileName);
            }

            Menu::create([
                'restaurant_id' => $request->restaurant_id,
                'category_id' => $category->id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $fileName, 
                'stock' => $request->stock, // Simpan stok
            ]);

            return redirect()->route('foods.index')
                ->with('success', 'Menu makanan berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->withInput()
                ->withErrors(['error' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function edit(Menu $menu)
    {
        $restaurants = Restaurant::all();
        return view('foods.edit', compact('menu', 'restaurants'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(storage_path('app/public/menus'), $fileName);
            }

            $menu->update([
                'restaurant_id' => $request->restaurant_id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $fileName ?? $menu->image
            ]);

            return redirect()->route('foods.index')
                ->with('success', 'Menu makanan berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->withInput()
                ->withErrors(['error' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();
            return redirect()->route('foods.index')
                ->with('success', 'Menu makanan berhasil dihapus');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error: ' . $e->getMessage()]);
        }
    }
}
