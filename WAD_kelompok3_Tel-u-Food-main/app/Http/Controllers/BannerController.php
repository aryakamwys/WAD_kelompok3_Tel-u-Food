<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('order')->get();
        return view('banners.index', compact('banners'));
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'integer'
        ]);

        try {
            // Pastikan folder exists
            if (!file_exists(storage_path('app/public/banners'))) {
                mkdir(storage_path('app/public/banners'), 0777, true);
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();

                // Simpan file
                $file->move(storage_path('app/public/banners'), $fileName);
            }

            Banner::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'image' => $fileName,
                'order' => $request->order ?? 0
            ]);

            return redirect()->route('banners.index')
                ->with('success', 'Banner berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'integer'
        ]);

        try {
            $data = [
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'order' => $request->order ?? 0
            ];

            if ($request->hasFile('image')) {
                // Hapus file lama jika ada
                $oldImagePath = storage_path('app/public/banners/' . $banner->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // Upload file baru
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();

                // Pastikan folder exists
                if (!file_exists(storage_path('app/public/banners'))) {
                    mkdir(storage_path('app/public/banners'), 0777, true);
                }

                // Simpan file baru
                $file->move(storage_path('app/public/banners'), $fileName);

                $data['image'] = $fileName;
            }

            $banner->update($data);

            return redirect()->route('banners.index')
                ->with('success', 'Banner berhasil diperbarui');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Error: ' . $e->getMessage()]);
        }
    }

    public function destroy(Banner $banner)
    {
        Storage::delete('public/banners/' . $banner->image);
        $banner->delete();

        return redirect()->route('banners.index')
            ->with('success', 'Banner berhasil dihapus');
    }
}
