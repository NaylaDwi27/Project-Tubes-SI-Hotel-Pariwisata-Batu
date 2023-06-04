<?php

namespace App\Http\Controllers;

use App\Models\JenisHotel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JenisHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login');
        } else {
            $jenis_hotel = JenisHotel::latest()->paginate(10);
            return view('jenis-hotel/jenis-hotel', compact('jenis_hotel'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login');
        } else {
            return view('jenis-hotel/tambah-jenis-hotel');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_hotel' => 'required',
            'deskripsi' => 'required',
        ]);
        JenisHotel::create([
            'nama'  => $request->jenis_hotel,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("jenis-hotel")->with("message", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisHotel $jenis_hotel)
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login');
        } else {
            return view('jenis-hotel.edit-jenis-hotel', compact('jenis_hotel'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisHotel $jenis_hotel)
    {
        $request->validate([
            'jenis_hotel' => 'required',
            'deskripsi' => 'required',
        ]);
        $jenis_hotel->update([
            'nama'  => $request->jenis_hotel,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("jenis-hotel")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisHotel $jenis_hotel)
    {
        $jenis_hotel->delete();
        return redirect("jenis-hotel")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $jenis_hotel = JenisHotel::get();
        $pdf = Pdf::loadview('jenis-hotel\laporan-jenis-hotel', ['jenis_hotel' => $jenis_hotel])->setPaper('a4');
        return $pdf->download('laporan-jenis-hotel.pdf');
    }
}
