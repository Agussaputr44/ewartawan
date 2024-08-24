<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    //

    public function getDashboard()
    {
        $user = Auth::user();
        $jumlahPengguna = User::count();
        $jumlahWartawan = User::where('role', 'wartawan')->count();
        $jumlahBerita = Berita::count();
        $jumlahKategori = KategoriBerita::count();
        $jumlahKomentar = Komentar::count();

        $beritaTerbaru = Berita::latest()->take(5)->get();
        $komentarTerbaru = Komentar::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('jumlahPengguna', 'jumlahWartawan', 'jumlahBerita', 'jumlahKategori', 'jumlahKomentar', 'beritaTerbaru', 'komentarTerbaru', 'user'));
    }
    public function getKelolaKomentar()
    {
        $jumlahKomentar = Komentar::count();
        $user = Auth::user();

        $komentars = Komentar::all();

        return view('admin.kelola_komentar', compact('komentars', 'jumlahKomentar', 'user'));
    }

    public function getKelolaUser()
    {
        $user = Auth::user();
        $usersByRole = User::all()->groupBy('role');
        return view('admin.kelola_pengguna', compact('user', 'usersByRole'));
    }

    public function getKelolaBerita()
    {
        $user = Auth::user();
        $beritas = Berita::all();
        $kategoris = KategoriBerita::all();
        return view('admin.kelola_berita', compact('user', 'beritas', 'kategoris'));
    }
    public function deleteBerita($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('kelola.berita')->with('success', 'Berita berhasil dihapus.');
    }
    public function deleteKomentar($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->delete();

        return redirect()->route('kelola.komentar')->with('success', 'komentar berhasil dihapus.');
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('kelola.user')->with('success', 'User berhasil dihapus.');
    }

    public function adminCreateUser(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nomor_telepon' => 'required|string|max:20',
            'gender' => 'required|in:pria,wanita',
            'password' => 'required|string|min:8',
            'media' => 'nullable|string',
            'role' => 'nullable|in:admin,redaktur,wartawan,user'
        ]);

        $user = User::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'nomor_telepon' => $request->input('nomor_telepon'),
            'gender' => $request->input('gender'),
            'password' => Hash::make($request->input('password')),
            'media' => $request->input('media'),
            'role' => $request->input('role', 'user')
        ]);

        return redirect()->route('kelola.user');
    }

    public function adminEditUser(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'nomor_telepon' => 'required|string|max:20',
            'gender' => 'required|in:pria,wanita',
            'password' => 'nullable|string|min:8',
            'media' => 'nullable|string',
            'role' => 'nullable|in:admin,redaktur,wartawan,user'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'nomor_telepon' => $request->input('nomor_telepon'),
            'gender' => $request->input('gender'),
            'media' => $request->input('media'),
            'role' => $request->input('role', 'user')
        ]);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
            $user->save();
        }

        return redirect()->route('kelola.user')->with('success', 'User berhasil diperbarui.');
    }

    public function adminCreateBerita(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'foto' => 'nullable|image',
            'status' => 'required|in:pending,published',
            'kategori_id' => 'required|exists:kategori_berita,id',
        ]);


        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->konten = $request->konten;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/foto');
            $berita->foto = basename($path);
        }

        $berita->status = $request->status;
        $berita->kategori_id = $request->kategori_id;
        $berita->user_id = Auth::id();
        $berita->save();

        return redirect()->route('kelola.berita')->with('success', 'Berita berhasil dibuat.');
    }


    public function adminEditBerita(Request $request, $id)
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

        return redirect()->route('kelola.berita')->with('success', 'Berita berhasil diupdate.');
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





}
