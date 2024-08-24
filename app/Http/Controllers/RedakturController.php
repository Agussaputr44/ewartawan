<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Komentar;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Auth;

class RedakturController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        return view('redaktur.index', compact('beritas'));
    }

    public function create()
    {
        $categories = KategoriBerita::all();
        return view('redaktur.create', compact('categories'));
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

        return redirect()->route('redaktur.index')->with('success', 'Berita berhasil dibuat.');
    }

    public function show($id)
    {
        $berita = Berita::with('kategori', 'user')->findOrFail($id);
        return view('redaktur.show', compact('berita'));
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $categories = KategoriBerita::all();
        return view('redaktur.edit', compact('berita', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'foto' => 'nullable|image',
            'status' => 'required|in:pending,published',
            'kategori_id' => 'required|exists:kategori_berita,id',
        ]);

        $berita = Berita::findOrFail($id);
        $berita->judul = $request->judul;
        $berita->konten = $request->konten;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/foto');
            $berita->foto = basename($path);
        }

        $berita->status = $request->status;

        $berita->kategori_id = $request->kategori_id;
        $berita->save();

        return redirect()->route('redaktur.kelolaBerita')->with('success', 'Berita berhasil diupdate.');
    }
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('redaktur.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function kelola()
    {
        $beritas = Berita::with('kategori')->orderBy('created_at', 'desc')->paginate(10);
        return view('redaktur.kelola', compact('beritas'));
    }

    public function updateKomentarStatus(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status_komentar' => 'required|in:pending,accepted',
        ]);

        $komentar = Komentar::findOrFail($id);
        $komentar->status_komentar = $validatedData['status_komentar'];
        $komentar->save();

        return redirect()->back()->with('success', 'Komentar status updated successfully.');
    }
    public function getKelolaKomentar()
    {
        $jumlahKomentar = Komentar::count();
        $user = Auth::user();

        $komentars = Komentar::all();

        return view('redaktur.kelola_komentar', compact('komentars', 'jumlahKomentar', 'user'));
    }
    public function deleteKomentar($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->delete();

        return redirect()->route('kelola.komentar')->with('success', 'komentar berhasil dihapus.');
    }

}
