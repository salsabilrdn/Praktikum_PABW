<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->role === 'admin') {
            return view('dashboard.admin');
        }

        return view('dashboard.pelamar');
    }
}
