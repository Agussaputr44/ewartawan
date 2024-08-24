<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getFeedback()
    {
        $komentars = Komentar::where('status_komentar', 'accepted')->with('user')->get();
        return view('menu.feedback', compact('komentars'));
    }
    public function getPanduan()
    {
        return view('menu.panduan');
    }
    public function getDataMedia()
    {
        $wartawan = User::where('role', 'wartawan')->get();
        return view('menu.data_media', compact('wartawan'));
    }

    public function getHukum()
    {
        return view('menu.hukum');
    }
    public function getPengumuman()
    {
        return view('menu.pengumuman');
    }
}
