<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::with('kategori')->orderBy('created_at', 'desc')->paginate(10);
        return view('wartawan.index', compact('beritas'));
    }

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

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dibuat.');
    }

    public function show($id)
    {
        $berita = Berita::with('kategori', 'user')->findOrFail($id);
        return view('wartawan.show', compact('berita'));
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $categories = KategoriBerita::all();
        return view('wartawan.edit', compact('berita', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'foto' => 'nullable|image',
            'kategori_id' => 'required|exists:kategori_berita,id',
        ]);

        $berita = Berita::findOrFail($id);
        $berita->judul = $request->judul;
        $berita->konten = $request->konten;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/foto');
            $berita->foto = basename($path);
        }

        $berita->kategori_id = $request->kategori_id;
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diupdate.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
