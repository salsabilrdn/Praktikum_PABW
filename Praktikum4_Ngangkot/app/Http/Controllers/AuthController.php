<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Simulasi user sementara
    private $users = [
        [
            'id' => 'PG0001',
            'namapeng' => 'Sabil',
            'email' => 'sabil@email.com',
            'password' => '123456', // plain text, bisa diubah
            'pekerjaan' => 'Mahasiswa'
        ],
    ];

    // Tampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cari user di array
        $user = collect($this->users)->first(fn($u) =>
            $u['email'] === $credentials['email'] && $u['password'] === $credentials['password']
        );

        if ($user) {
            session([
                'user_id' => $user['id'],
                'user_name' => $user['namapeng'],
                'user_email' => $user['email']
            ]);
            return redirect()->route('index');
        }

        return back()->with('error', 'Email atau password salah')->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

    // Tampilkan form register (opsional)
    public function showRegisterForm()
    {
        return view('register');
    }

    // Proses register sementara (disimpan di session, tidak permanen)
    public function register(Request $request)
    {
        $validated = $request->validate([
            'namapeng' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:15',
            'pekerjaan' => 'required|string'
        ]);

        // Simpan user di session sementara
        $users = session('users', []);
        $idpeng = 'PG' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

        $users[] = [
            'id' => $idpeng,
            'namapeng' => $validated['namapeng'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'pekerjaan' => $validated['pekerjaan']
        ];

        session(['users' => $users]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silakan login.');
    }
}