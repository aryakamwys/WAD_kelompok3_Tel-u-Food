<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    // Menampilkan daftar makanan
    public function index()
    {
        $makanans = Makanan::all(); // Mengambil semua data makanan
        return view('makanan.index', compact('makanans')); // Menampilkan view dengan data makanan
    }

    public function edit($id)
    {
        $makanan = Makanan::findOrFail($id); // Mencari makanan berdasarkan ID
        return view('makanan.edit', compact('makanan')); // Menampilkan halaman edit dengan data makanan
    }

    // Menampilkan form untuk membuat makanan baru
    public function create()
    {
        return view('makanan.create');
    }

    // Menyimpan makanan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('images', 'public');
        }

        Makanan::create($data);
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit makanan
   

    // Memperbarui makanan di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $makanan = Makanan::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('images', 'public');
        }

        $makanan->update($data);
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil diperbarui');
    }

    // Menghapus makanan dari database
    public function destroy($id)
    {
        $makanan = Makanan::findOrFail($id);
        $makanan->delete();
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil dihapus');
    }
}
