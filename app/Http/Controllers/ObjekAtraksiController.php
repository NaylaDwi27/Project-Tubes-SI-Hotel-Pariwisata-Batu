<?php

namespace App\Http\Controllers;

use App\Models\ObjekAtraksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ObjekAtraksiController extends Controller
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
            $objek = ObjekAtraksi::latest()->paginate(10);
            return view('objek-atraksi/objek-atraksi', compact('objek'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            return view('objek-atraksi/tambah-objek-atraksi');
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
            'tipe_objek' => 'required',
            'harga_masuk' => 'required',
        ]);
        ObjekAtraksi::create([
            'nama'  => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tipe_objek' => $request->tipe_objek,
            'harga_masuk' => $request->harga_masuk,
        ]);
        return redirect("objek-atraksi")->with("message", "Data berhasil disimpan");
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
    public function edit(ObjekAtraksi $objek_atraksi)
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login');
        } else {
            return view('objek-atraksi/edit-objek-atraksi', compact('objek_atraksi'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObjekAtraksi $objek_atraksi)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'tipe_objek' => 'required',
            'harga_masuk' => 'required',
        ]);
        $objek_atraksi->update([
            'nama'  => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tipe_objek' => $request->tipe_objek,
            'harga_masuk' => $request->harga_masuk,
        ]);
        return redirect("objek-atraksi")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObjekAtraksi $objek_atraksi)
    {
        $objek_atraksi->delete();
        return redirect("objek-atraksi")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $objek_atraksi = ObjekAtraksi::get();
        $pdf = Pdf::loadview('objek-atraksi/laporan-objek-atraksi', ['objek_atraksi' => $objek_atraksi])->setPaper('a4');
        return $pdf->download('laporan-objek-atraksi.pdf');
    }
}
