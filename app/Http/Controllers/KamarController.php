<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Kamar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
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
            $kamar = Kamar::join('hotel', 'hotel.id_hotel', '=', 'kamar.id_hotel')
                ->select('kamar.*', 'hotel.nama as nama_hotel')
                ->paginate(10);
            return view('kamar/kamar', compact('kamar'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            return view('kamar/tambah-kamar', $data);
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
            'nama' => 'required',
            'tipe_kamar' => 'required',
            'harga_kamar' => 'required',
            'jumlah_kamar' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/foto-kamar', $image->hashName());
        Kamar::create([
            'id_hotel' => $request->id_hotel,
            'nama_kamar'  => $request->nama,
            'tipe_kamar' => $request->tipe_kamar,
            'harga_kamar' => $request->harga_kamar,
            'jumlah_kamar' => $request->jumlah_kamar,
            'foto' => $image->hashName(),
        ]);
        return redirect("kamar")->with("message", "Data berhasil disimpan");
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
    public function edit(Kamar $kamar)
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login');
        } else {
            $data['hotelSaatIni'] = Hotel::find($kamar->id_hotel);
            $data['hotel'] = Hotel::all();
            return view('kamar.edit-kamar', compact('kamar'), $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'id_hotel' => 'required',
            'nama' => 'required',
            'tipe_kamar' => 'required',
            'harga_kamar' => 'required',
            'jumlah_kamar' => 'required',
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/foto-kamar', $image->hashName());
            Storage::delete('public/foto-kamar/' . $kamar->image);

            $kamar->update([
                'id_hotel' => $request->id_hotel,
                'nama_kamar'  => $request->nama,
                'tipe_kamar' => $request->tipe_kamar,
                'harga_kamar' => $request->harga_kamar,
                'jumlah_kamar' => $request->jumlah_kamar,
                'foto' => $image->hashName(),
            ]);
        } else {
            $kamar->update([
                'id_hotel' => $request->id_hotel,
                'nama_kamar'  => $request->nama,
                'tipe_kamar' => $request->tipe_kamar,
                'harga_kamar' => $request->harga_kamar,
                'jumlah_kamar' => $request->jumlah_kamar,
            ]);
        }
        // echo  $kamar;
        return redirect("kamar")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect("kamar")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $kamar = Kamar::join('hotel', 'hotel.id_hotel', '=', 'kamar.id_hotel')
            ->select('kamar.*', 'hotel.nama as nama_hotel')
            ->get();
        $pdf = Pdf::loadview('kamar/laporan-kamar', ['kamar' => $kamar])->setPaper('a4');
        return $pdf->download('laporan-kamar.pdf');
    }
}
