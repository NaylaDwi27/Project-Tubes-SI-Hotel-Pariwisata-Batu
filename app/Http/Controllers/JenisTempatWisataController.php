<?php

namespace App\Http\Controllers;

use App\Models\JenisTempatWisata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JenisTempatWisataController extends Controller
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
            $jenis_tempat = JenisTempatWisata::latest()->paginate(10);
            return view('jenis-tempat-wst/jenis-tempat-wst', compact('jenis_tempat'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            return view('jenis-tempat-wst/tambah-jenis-tempat-wst');
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
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        JenisTempatWisata::create([
            'nama'  => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("jenis-tempat-wst")->with("message", "Data berhasil disimpan");
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
    public function edit(JenisTempatWisata $jenis_tempat_wst)
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login');
        } else {
            return view('jenis-tempat-wst/edit-jenis-tempat-wst', compact('jenis_tempat_wst'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisTempatWisata $jenis_tempat_wst)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        $jenis_tempat_wst->update([
            'nama'  => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("jenis-tempat-wst")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisTempatWisata $jenis_tempat_wst)
    {
        $jenis_tempat_wst->delete();
        return redirect("jenis-tempat-wst")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $jenis_tempat_wst = JenisTempatWisata::get();
        $pdf = Pdf::loadview('jenis-tempat-wst/laporan-jenis-tempat-wst', ['jenis_tempat_wst' => $jenis_tempat_wst])->setPaper('a4');
        return $pdf->download('laporan-jenis-tempat-wisata.pdf');
    }
}
