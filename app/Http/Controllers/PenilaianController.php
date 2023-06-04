<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Penilaian;
use App\Models\TempatWisata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenilaianController extends Controller
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
            $penilaian = Penilaian::join('hotel', 'hotel.id_hotel', '=', 'penilaian.id_hotel')
                ->join('tempat_wisata', 'tempat_wisata.id_tempat_wisata', '=', 'penilaian.id_tempat_wisata')
                ->select('penilaian.*', 'hotel.nama as nama_hotel', 'tempat_wisata.nama as nama_wisata')
                ->paginate(10);
            return view('penilaian/penilaian', compact('penilaian'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            $data['wisata'] = TempatWisata::all();
            $data['hotel'] = Hotel::all();
            return view('penilaian/tambah-penilaian', $data);
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
            'id_tempat_wisata' => 'required',
            'skor' => 'required',
            'komentar' => 'required',
            'tgl_penilaian' => 'required',
        ]);
        Penilaian::create([
            'id_hotel'  => $request->id_hotel,
            'id_tempat_wisata'  => $request->id_tempat_wisata,
            'skor'  => $request->skor,
            'komentar' => $request->komentar,
            'tgl_penilaian'  => $request->tgl_penilaian,
        ]);
        return redirect("penilaian")->with("message", "Data berhasil disimpan");
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
    public function edit(Penilaian $penilaian)
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login');
        } else {
            $data['wisataSaatIni'] = TempatWisata::find($penilaian->id_tempat_wisata);
            $data['wisata'] = TempatWisata::all();
            $data['hotelSaatIni'] = Hotel::find($penilaian->id_hotel);
            $data['hotel'] = Hotel::all();
            return view('penilaian/edit-penilaian', compact('penilaian'), $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penilaian $penilaian)
    {
        $request->validate([
            'id_hotel' => 'required',
            'id_tempat_wisata' => 'required',
            'skor' => 'required',
            'komentar' => 'required',
            'tgl_penilaian' => 'required',
        ]);
        $penilaian->update([
            'id_hotel'  => $request->id_hotel,
            'id_tempat_wisata'  => $request->id_tempat_wisata,
            'skor'  => $request->skor,
            'komentar' => $request->komentar,
            'tgl_penilaian'  => $request->tgl_penilaian,
        ]);
        return redirect("penilaian")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penilaian $penilaian)
    {
        $penilaian->delete();
        return redirect("penilaian")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $penilaian = Penilaian::join('hotel', 'hotel.id_hotel', '=', 'penilaian.id_hotel')
            ->join('tempat_wisata', 'tempat_wisata.id_tempat_wisata', '=', 'penilaian.id_tempat_wisata')
            ->select('penilaian.*', 'hotel.nama as nama_hotel', 'tempat_wisata.nama as nama_wisata')
            ->get();
        $pdf = Pdf::loadview('penilaian/laporan-penilaian', ['penilaian' => $penilaian])->setPaper('a4');
        return $pdf->download('laporan-penilaian.pdf');
    }
}
