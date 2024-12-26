<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'is_active' => 'boolean'
        ]);

        $validated['image'] = $request->file('image')->store('banners', 'public');
        $validated['is_active'] = $request->has('is_active');

        Banner::create($validated);
        return redirect()->route('admin.banners.index')->with('success', 'Banner berhasil ditambahkan');
    }
} 