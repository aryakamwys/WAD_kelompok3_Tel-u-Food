<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Restaurant;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $banners = Banner::orderBy('order')->get();
        $restaurants = Restaurant::latest()->take(6)->get();
        $foods = Menu::whereHas('category', function ($query) {
            $query->where('name', 'Food');
        })->with('restaurant')->latest()->take(6)->get();
        $beverages = Menu::whereHas('category', function ($query) {
            $query->where('name', 'Beverage');
        })->with('restaurant')->latest()->take(6)->get();

        return view('public.home', compact('banners', 'restaurants', 'foods', 'beverages'));
    }

    public function restaurants(Request $request)
    {
        $query = Restaurant::query();

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('address', 'like', "%{$search}%");
        }

        $restaurants = $query->withCount('menus')->latest()->paginate(12);
        return view('public.restaurants', compact('restaurants'));
    }

    public function restaurantDetail(Restaurant $restaurant)
    {
        $foods = $restaurant->menus()
            ->whereHas('category', function ($q) {
                $q->where('name', 'Food');
            })->get();

        $beverages = $restaurant->menus()
            ->whereHas('category', function ($q) {
                $q->where('name', 'Beverage');
            })->get();

        return view('public.restaurant-detail', compact('restaurant', 'foods', 'beverages'));
    }

    public function menus(Request $request)
    {
        $query = Menu::with(['restaurant', 'category']);

        // Filter by category
        if ($request->has('category') && $request->category != '') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Price range
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $menus = $query->latest()->paginate(12);
        return view('public.menus', compact('menus'));
    }
}
