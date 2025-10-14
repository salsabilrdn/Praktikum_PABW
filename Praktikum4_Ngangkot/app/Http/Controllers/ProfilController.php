<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        // Ambil data user login
        $user = auth()->user(); // pastikan middleware auth digunakan
        return view('profil', compact('user'));
    }
}
