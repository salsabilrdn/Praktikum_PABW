<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // tambahkan import User

class LamaranController extends Controller
{
    public function __construct()
    {
        // Lindungi pemanggilan middleware() agar tidak menimbulkan fatal error
        // jika method middleware tidak tersedia pada runtime (mis. non-Laravel context).
        if (method_exists($this, 'middleware')) {
            $this->middleware('auth');
        }
    }

    public function index(): View
    {
        // ambil user dan cek null agar analyzer/IDE tidak menandai kemungkinan null
        $user = Auth::user();
        if ($user === null) {
            abort(403);
        }
        // beritahu analyzer bahwa $user adalah User
        assert($user instanceof User);

        if ($user->role === 'admin') {
            // admin lihat semua lamaran
            $lamarans = Lamaran::with(['user', 'lowongan'])->get();
        } else {
            // pelamar cuma lihat lamaran sendiri
            $lamarans = Lamaran::with(['lowongan'])
                ->where('user_id', $user->id)
                ->get();
        }

        return view('lamaran.index', compact('lamarans'));
    }

    public function create(): View
    {
        $lowongans = Lowongan::all();
        return view('lamaran.create', compact('lowongans'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'lowongan_id' => 'required|exists:lowongans,id',
            'deskripsi_lamaran' => 'required',
            'cv_file' => 'required|mimes:pdf,doc,docx',
        ]);

        $file = $request->file('cv_file')->store('cv', 'public');

    // ambil id user dengan Facade (untuk menghilangkan error analyzer)
    $userId = Auth::id();
    if (!$userId) {
        return redirect()->route('login')->with('error', 'Silahkan login dulu');
    }

    Lamaran::create([
         'user_id' => $userId,
        'lowongan_id' => $request->lowongan_id,
        'deskripsi_lamaran' => $request->deskripsi_lamaran,
        'cv_file' => $file,
    ]);

    return redirect()->back()->with('success', 'Lamaran berhasil dikirim');
}

}
