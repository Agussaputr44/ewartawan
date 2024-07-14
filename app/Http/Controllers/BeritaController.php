<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function create()
    {
        $categories = KategoriBerita::all();
        return view('wartawan.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'foto' => 'nullable|image',
            'kategori_id' => 'required|exists:kategori_berita,id',
        ]);

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->konten = $request->konten;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/foto');
            $berita->foto = basename($path);
        }

        $berita->status = 'pending';
        $berita->kategori_id = $request->kategori_id;
        $berita->user_id = Auth::id();
        $berita->save();

        return redirect()->route('.create')->with('success', 'Berita berhasil dibuat.');
    }
}
