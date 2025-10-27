<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensorController extends Controller
{
    public fuction prosesData() {
        return view('form')
    }
    public fuction hasil-sensor(request $request) {
        $lokasi = request->input('lokasi');
        $ketinggianair = request->input('Ketinggian Air');
        $curahhujan = request->input('Curah Hujan');
        $kelembapantanah = request->input('KelembapanTanah');

        return view('hasil', compact('lokasi','ketinggianAir','CurahHujan','KelembapanTanah'))
    }
}
