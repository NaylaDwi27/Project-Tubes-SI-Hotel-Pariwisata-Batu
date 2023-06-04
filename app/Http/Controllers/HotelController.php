<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\JenisHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class HotelController extends Controller
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
            $hotel = Hotel::join('jenis_hotel', 'jenis_hotel.id_jenis_hotel', '=', 'hotel.id_jenis_hotel')
                ->select('hotel.*', 'jenis_hotel.nama as jenis_hotel')
                ->paginate(10);
            return view('hotel/hotel', compact('hotel'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            $data['jenis'] = JenisHotel::all();
            return view('hotel/tambah-hotel', $data);
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
            'id_jenis_hotel' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'jumlah_kamar' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/foto-hotel', $image->hashName());
        Hotel::create([
            'id_jenis_hotel' => $request->id_jenis_hotel,
            'nama'  => $request->nama,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'jumlah_kamar' => $request->jumlah_kamar,
            'foto' => $image->hashName(),
        ]);
        return redirect("hotel")->with("message", "Data berhasil disimpan");
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
    public function edit(Hotel $hotel)
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login');
        } else {
            $data["jenisSaatIni"] = JenisHotel::find($hotel->id_jenis_hotel);
            $data['jenis'] = JenisHotel::all();
            return view('hotel.edit-hotel', compact('hotel'), $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'id_jenis_hotel' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'jumlah_kamar' => 'required',
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/foto-hotel', $image->hashName());
            Storage::delete('public/foto-hotel/' . $hotel->image);

            $hotel->update([
                'id_jenis_hotel' => $request->id_jenis_hotel,
                'nama'  => $request->nama,
                'alamat' => $request->alamat,
                'deskripsi' => $request->deskripsi,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'jumlah_kamar' => $request->jumlah_kamar,
                'foto' => $image->hashName(),
            ]);
        } else {
            $hotel->update([
                'id_jenis_hotel' => $request->id_jenis_hotel,
                'nama'  => $request->nama,
                'alamat' => $request->alamat,
                'deskripsi' => $request->deskripsi,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'jumlah_kamar' => $request->jumlah_kamar
            ]);
        }
        // echo  $hotel;
        return redirect("hotel")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect("hotel")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $hotel = Hotel::join('jenis_hotel', 'jenis_hotel.id_jenis_hotel', '=', 'hotel.id_jenis_hotel')
            ->select('hotel.*', 'jenis_hotel.nama as jenis_hotel')->get();
        $pdf = Pdf::loadview('hotel/laporan-hotel', ['hotel' => $hotel])->setPaper('a4');
        return $pdf->download('laporan-hotel.pdf');
    }
}
