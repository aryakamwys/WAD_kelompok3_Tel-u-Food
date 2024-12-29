<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with(['restaurant', 'category'])->latest()->get();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        $categories = Category::all();
        return view('menus.create', compact('restaurants', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            if (!file_exists(storage_path('app/public/menus'))) {
                mkdir(storage_path('app/public/menus'), 0777, true);
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(storage_path('app/public/menus'), $fileName);
            }

            Menu::create([
                'restaurant_id' => $request->restaurant_id,
                'category_id' => $request->category_id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $fileName
            ]);

            return redirect()->route('menus.index')
                ->with('success', 'Menu berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function edit(Menu $menu)
    {
        $restaurants = Restaurant::all();
        $categories = Category::all();
        return view('menus.edit', compact('menu', 'restaurants', 'categories'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $data = $request->except('image');

            if ($request->hasFile('image')) {
                // Hapus file lama
                $oldImagePath = storage_path('app/public/menus/' . $menu->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // Upload file baru
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(storage_path('app/public/menus'), $fileName);

                $data['image'] = $fileName;
            }

            $menu->update($data);

            return redirect()->route('menus.index')
                ->with('success', 'Menu berhasil diperbarui');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function destroy(Menu $menu)
    {
        try {
            // Hapus file gambar
            $imagePath = storage_path('app/public/menus/' . $menu->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $menu->delete();

            return redirect()->route('menus.index')
                ->with('success', 'Menu berhasil dihapus');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error: ' . $e->getMessage()]);
        }
    }
}
