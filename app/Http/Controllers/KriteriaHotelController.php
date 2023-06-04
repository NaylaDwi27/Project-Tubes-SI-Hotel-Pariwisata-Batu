<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\KriteriaHotel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaHotelController extends Controller
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
            $kriteria_hotel = KriteriaHotel::join('hotel', 'hotel.id_hotel', '=', 'kriteria_hotel.id_hotel')
                ->select('kriteria_hotel.*', 'hotel.nama as nama_hotel')
                ->paginate(10);
            return view('kriteria-hotel/kriteria-hotel', compact('kriteria_hotel'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            $data['hotel'] = Hotel::all();
            return view('kriteria-hotel/tambah-kriteria-hotel', $data);
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
            'id_hotel' => 'required',
            'kriteria' => 'required',
            'deskripsi' => 'required',
            'nilai' => 'required',
        ]);
        KriteriaHotel::create([
            'id_hotel'  => $request->id_hotel,
            'nama'  => $request->kriteria,
            'deskripsi' => $request->deskripsi,
            'nilai'  => $request->nilai,
        ]);
        return redirect("kriteria-hotel")->with("message", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(KriteriaHotel $kriteria_hotel)
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login');
        } else {
            $data['hotelSaatIni'] = Hotel::find($kriteria_hotel->id_hotel);
            $data['hotel'] = Hotel::all();
            return view('kriteria-hotel.edit-kriteria-hotel', compact('kriteria_hotel'), $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KriteriaHotel $kriteria_hotel)
    {
        $request->validate([
            'id_hotel' => 'required',
            'kriteria' => 'required',
            'deskripsi' => 'required',
            'nilai' => 'required',
        ]);
        $kriteria_hotel->update([
            'id_hotel'  => $request->id_hotel,
            'nama'  => $request->kriteria,
            'deskripsi' => $request->deskripsi,
            'nilai'  => $request->nilai,
        ]);
        return redirect("kriteria-hotel")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KriteriaHotel $kriteria_hotel)
    {
        $kriteria_hotel->delete();
        return redirect("kriteria-hotel")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $kriteria_hotel = KriteriaHotel::join('hotel', 'hotel.id_hotel', '=', 'kriteria_hotel.id_hotel')
            ->select('kriteria_hotel.*', 'hotel.nama as nama_hotel')
            ->get();
        $pdf = Pdf::loadview('kriteria-hotel/laporan-kriteria-hotel', ['kriteria_hotel' => $kriteria_hotel])->setPaper('a4');
        return $pdf->download('laporan-kriteria-hotel.pdf');
    }
}
