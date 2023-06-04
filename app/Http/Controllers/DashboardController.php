<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Pegawai;
use App\Models\Pemesanan;
use App\Models\TempatWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login')->with('info', 'Kamu harus login dulu');
        } else {
            $data['pegawai'] = Pegawai::count();
            $data['hotel'] = Hotel::count();
            $data['tempat_wisata'] = TempatWisata::count();
            $data['pemesanan'] = Pemesanan::count();
            return view('dashboard', $data);
        }
    }
}
