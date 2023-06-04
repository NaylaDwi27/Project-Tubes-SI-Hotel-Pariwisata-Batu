<?php

namespace App\Http\Controllers;

use App\Models\KriteriaTempatWisata;
use App\Models\TempatWisata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaTempatWisataController extends Controller
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
            $kriteria_tempat_wisata = KriteriaTempatWisata::join('tempat_wisata', 'tempat_wisata.id_tempat_wisata', 'kriteria_tempat_wisata.id_tempat_wisata')
                ->select('kriteria_tempat_wisata.*', 'tempat_wisata.nama as nama_wisata')
                ->paginate(10);
            return view('kriteria-tempat-wst/kriteria-tempat-wst', compact('kriteria_tempat_wisata'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            return view('kriteria-tempat-wst/tambah-kriteria-tempat-wst', $data);
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
            'id_tempat_wisata' => 'required',
            'kriteria' => 'required',
            'deskripsi' => 'required',
            'nilai' => 'required',
        ]);
        KriteriaTempatWisata::create([
            'id_tempat_wisata'  => $request->id_tempat_wisata,
            'nama'  => $request->kriteria,
            'deskripsi' => $request->deskripsi,
            'nilai'  => $request->nilai,
        ]);
        return redirect("kriteria-tempat-wst")->with("message", "Data berhasil disimpan");
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
    public function edit(KriteriaTempatWisata $kriteria_tempat_wst)
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login');
        } else {
            $data['tempatSaatIni'] = TempatWisata::find($kriteria_tempat_wst->id_tempat_wisata);
            $data['tempatWisata'] = TempatWisata::all();
            return view('kriteria-tempat-wst/edit-kriteria-tempat-wst', compact('kriteria_tempat_wst'), $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KriteriaTempatWisata $kriteria_tempat_wst)
    {
        $request->validate([
            'id_tempat_wisata' => 'required',
            'kriteria' => 'required',
            'deskripsi' => 'required',
            'nilai' => 'required',
        ]);
        $kriteria_tempat_wst->update([
            'id_tempat_wisata'  => $request->id_tempat_wisata,
            'nama'  => $request->kriteria,
            'deskripsi' => $request->deskripsi,
            'nilai'  => $request->nilai,
        ]);
        return redirect("kriteria-tempat-wst")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KriteriaTempatWisata $kriteria_tempat_wst)
    {
        $kriteria_tempat_wst->delete();
        return redirect("kriteria-tempat-wst")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $kriteria_tempat_wisata = KriteriaTempatWisata::join('tempat_wisata', 'tempat_wisata.id_tempat_wisata', 'kriteria_tempat_wisata.id_tempat_wisata')
            ->select('kriteria_tempat_wisata.*', 'tempat_wisata.nama as nama_wisata')
            ->get();
        $pdf = Pdf::loadview('kriteria-tempat-wst/laporan-kriteria-tempat-wst', ['kriteria_tempat_wisata' => $kriteria_tempat_wisata])->setPaper('a4');
        return $pdf->download('laporan-kriteria-tempat-wst.pdf');
    }
}
