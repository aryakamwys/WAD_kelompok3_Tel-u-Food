<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Restaurant;

class DashboardController extends Controller
{
    public function index()
    {
        $banners = Banner::where('is_active', true)->get();
        $restaurants = Restaurant::latest()->get();
        
        return view('dashboard', compact('banners', 'restaurants'));
    }
} 