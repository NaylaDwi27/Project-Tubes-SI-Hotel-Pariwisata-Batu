<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Hotel;
use App\Models\TempatWisata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FasilitasController extends Controller
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
            $fasilitas = Fasilitas::join('hotel', 'hotel.id_hotel', 'fasilitas.id_hotel')
                ->join('tempat_wisata', 'tempat_wisata.id_tempat_wisata', 'fasilitas.id_tempat_wisata')
                ->select('hotel.nama as nama_hotel', 'fasilitas.*', 'tempat_wisata.nama as nama_tempat_wisata')
                ->paginate(10);
            return view('fasilitass/fasilitass', compact('fasilitas'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            $data['wisata'] = TempatWisata::all();
            return view('fasilitass/tambah-fasilitass', $data);
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
            'nama_fasilitas' => 'required',
            'deskripsi' => 'required',
        ]);
        Fasilitas::create([
            'id_hotel'  => $request->id_hotel,
            'id_tempat_wisata'  => $request->id_tempat_wisata,
            'nama'  => $request->nama_fasilitas,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("fasilitass")->with("message", "Data berhasil disimpan");
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
    public function edit(Fasilitas $fasilitass)
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login');
        } else {
            $data['hotelSaatIni'] = Hotel::find($fasilitass->id_hotel);
            $data['hotel'] = Hotel::all();
            $data['wisataSaatIni'] = TempatWisata::find($fasilitass->id_tempat_wisata);
            $data['wisata'] = TempatWisata::all();
            return view('fasilitass/edit-fasilitass', compact('fasilitass'), $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasilitas $fasilitass)
    {
        $request->validate([
            'id_hotel' => 'required',
            'id_tempat_wisata' => 'required',
            'nama_fasilitas' => 'required',
            'deskripsi' => 'required',
        ]);
        $fasilitass->update([
            'id_hotel'  => $request->id_hotel,
            'id_tempat_wisata'  => $request->id_tempat_wisata,
            'nama'  => $request->nama_fasilitas,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("fasilitass")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilitass)
    {
        $fasilitass->delete();
        return redirect("fasilitass")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $fasilitas =  Fasilitas::join('hotel', 'hotel.id_hotel', 'fasilitas.id_hotel')
            ->join('tempat_wisata', 'tempat_wisata.id_tempat_wisata', 'fasilitas.id_tempat_wisata')
            ->select('hotel.nama as nama_hotel', 'fasilitas.*', 'tempat_wisata.nama as nama_tempat_wisata')
            ->get();
        $pdf = Pdf::loadview('fasilitass/laporan-fasilitass', ['fasilitas' => $fasilitas])->setPaper('a4');
        return $pdf->download('laporan-fasilitas.pdf');
    }
}
