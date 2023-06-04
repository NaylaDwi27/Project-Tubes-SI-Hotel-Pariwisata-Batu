<?php

namespace App\Http\Controllers;

use App\Models\JenisTempatWisata;
use App\Models\ObjekAtraksi;
use App\Models\TempatWisata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TempatWisataController extends Controller
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
            $tempat_wisata = TempatWisata::join('jenis_tempat_wisata', 'jenis_tempat_wisata.id_jenis_wisata', 'tempat_wisata.id_jenis_wisata')
                ->join('objek_atraksi', 'objek_atraksi.id_objek_atraksi', 'tempat_wisata.id_objek_atraksi')
                ->select('tempat_wisata.*', 'jenis_tempat_wisata.nama as jenis_tempat_wisata', 'objek_atraksi.nama as objek_atraksi')
                ->paginate(10);
            return view('tempat-wst/tempat-wst', compact('tempat_wisata'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            $data['jenis'] = JenisTempatWisata::all();
            $data['objek'] = ObjekAtraksi::all();
            return view('tempat-wst/tambah-tempat-wst', $data);
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
            'id_jenis_wisata' => 'required',
            'id_objek_atraksi' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'kapasitas' => 'required',
            'harga' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/foto-tempat-wisata', $image->hashName());
        TempatWisata::create([
            'id_jenis_wisata' => $request->id_jenis_wisata,
            'id_objek_atraksi' => $request->id_objek_atraksi,
            'nama'  => $request->nama,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
            'foto' => $image->hashName(),
        ]);
        return redirect("tempat-wst")->with("message", "Data berhasil disimpan");
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
    public function edit(TempatWisata $tempat_wst)
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login');
        } else {
            $data['jenisSaatIni'] = JenisTempatWisata::find($tempat_wst->id_jenis_wisata);
            $data['jenis'] = JenisTempatWisata::all();
            $data['objekSaatIni'] = ObjekAtraksi::find($tempat_wst->id_objek_wisata);
            $data['objek'] = ObjekAtraksi::all();
            return view('tempat-wst/edit-tempat-wst', compact('tempat_wst'), $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempatWisata $tempat_wst)
    {
        $request->validate([
            'id_jenis_wisata' => 'required',
            'id_objek_atraksi' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'kapasitas' => 'required',
            'harga' => 'required',
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/foto-tempat-wisata', $image->hashName());
            Storage::delete('public/foto-tempat-wisata/' . $tempat_wst->image);

            $tempat_wst->update([
                'id_jenis_wisata' => $request->id_jenis_wisata,
                'id_objek_atraksi' => $request->id_objek_atraksi,
                'nama'  => $request->nama,
                'alamat' => $request->alamat,
                'deskripsi' => $request->deskripsi,
                'jam_buka' => $request->jam_buka,
                'jam_tutup' => $request->jam_tutup,
                'kapasitas' => $request->kapasitas,
                'harga' => $request->harga,
                'foto' => $image->hashName(),
            ]);
        } else {
            $tempat_wst->update([
                'id_jenis_wisata' => $request->id_jenis_wisata,
                'id_objek_atraksi' => $request->id_objek_atraksi,
                'nama'  => $request->nama,
                'alamat' => $request->alamat,
                'deskripsi' => $request->deskripsi,
                'jam_buka' => $request->jam_buka,
                'jam_tutup' => $request->jam_tutup,
                'kapasitas' => $request->kapasitas,
                'harga' => $request->harga,
            ]);
        }
        return redirect("tempat-wst")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempatWisata $tempat_wst)
    {
        $tempat_wst->delete();
        return redirect("tempat-wst")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $tempat_wst = TempatWisata::join('jenis_tempat_wisata', 'jenis_tempat_wisata.id_jenis_wisata', 'tempat_wisata.id_jenis_wisata')
        ->join('objek_atraksi', 'objek_atraksi.id_objek_atraksi', 'tempat_wisata.id_objek_atraksi')
        ->select('tempat_wisata.*', 'jenis_tempat_wisata.nama as jenis_tempat_wisata', 'objek_atraksi.nama as objek_atraksi')
        ->get();
        $pdf = Pdf::loadview('tempat-wst/laporan-tempat-wst', ['tempat_wst' => $tempat_wst])->setPaper('a4');
        return $pdf->download('laporan-tempat-wisata.pdf');
    }
}
