<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index()
    {
        $komentar = Komentar::all();
        return response()->json($komentar);
    }

    public function store(Request $request)
    {
        $request->validate([
            'isi_komentar' => 'required|string',
        ]);

        $user = Auth::user(); // Assumes the user is authenticated

        Komentar::create([
            'id_user' => $user->id,
            'isi_komentar' => $request->input('isi_komentar'),
            'status_komentar' => 'pending',
        ]);

        return redirect()->route('feedback')->with('success', 'Komentar Anda telah berhasil dikirim dan menunggu persetujuan.');
    }
    public function show($id)
    {
        $komentar = Komentar::findOrFail($id);
        return response()->json($komentar);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_user' => 'exists:users,id',
            'isi_komentar' => 'string',
            'status_komentar' => 'in:pending,accepted',
        ]);

        $komentar = Komentar::findOrFail($id);
        $komentar->update($request->all());
        return response()->json($komentar);
    }

    public function destroy($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->delete();
        return response()->json(null, 204);
    }
}
