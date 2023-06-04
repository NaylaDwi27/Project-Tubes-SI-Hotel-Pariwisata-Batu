<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\ObjekAtraksi;
use App\Models\Pegawai;
use App\Models\Pemesanan;
use App\Models\TempatWisata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PemesananController extends Controller
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
            $pemesanan = Pemesanan::join('hotel', 'hotel.id_hotel', '=', 'pemesanan.id_hotel')
                ->join('tempat_wisata', 'tempat_wisata.id_tempat_wisata', '=', 'pemesanan.id_tempat_wisata')
                ->join('objek_atraksi', 'objek_atraksi.id_objek_atraksi', '=', 'pemesanan.id_objek_atraksi')
                ->join('pegawai', 'pegawai.id_pegawai', 'pemesanan.id_pegawai')
                ->select('pemesanan.*', 'hotel.nama as nama_hotel', 'tempat_wisata.nama as nama_wisata', 'objek_atraksi.nama as nama_objek', 'pegawai.nama as nama_pegawai')
                ->paginate(10);
            return view('pemesanan/pemesanan', compact('pemesanan'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            $data['pegawai'] = Pegawai::all();
            $data['objek'] = ObjekAtraksi::all();
            return view('pemesanan/tambah-pemesanan', $data);
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
            'id_objek_atraksi' => 'required',
            'id_pegawai' => 'required',
            'tgl_pemesanan' => 'required',
            'nama_pengunjung' => 'required',
            'alamat_pengunjung' => 'required',
            'no_telp' => 'required',
            'total_transaksi' => 'required',
            'metode_pembayaran' => 'required',
            'deskripsi' => 'required',
        ]);
        Pemesanan::create([
            'id_hotel'  => $request->id_hotel,
            'id_tempat_wisata'  => $request->id_tempat_wisata,
            'id_objek_atraksi'  => $request->id_objek_atraksi,
            'id_pegawai'  => $request->id_pegawai,
            'tgl_pemesanan'  => $request->tgl_pemesanan,
            'nama_pengunjung'  => $request->nama_pengunjung,
            'alamat_pengunjung'  => $request->alamat_pengunjung,
            'no_telp'  => $request->no_telp,
            'total_transaksi'  => $request->total_transaksi,
            'metode_pembayaran'  => $request->metode_pembayaran,
            'catatan' => $request->deskripsi,
        ]);
        return redirect("pemesanan")->with("message", "Data berhasil disimpan");
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
    public function edit(Pemesanan $pemesanan)
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login');
        } else {
            $data['wisataSaatIni'] = TempatWisata::find($pemesanan->id_tempat_wisata);
            $data['hotelSaatIni'] = Hotel::find($pemesanan->id_hotel);
            $data['pegawaiSaatIni'] = Pegawai::find($pemesanan->id_pegawai);
            $data['objekSaatIni'] = ObjekAtraksi::find($pemesanan->id_objek_atraksi);

            $data['wisata'] = TempatWisata::all();
            $data['hotel'] = Hotel::all();
            $data['pegawai'] = Pegawai::all();
            $data['objek'] = ObjekAtraksi::all();
            return view('pemesanan/edit-pemesanan', compact('pemesanan'), $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'id_hotel' => 'required',
            'id_tempat_wisata' => 'required',
            'id_objek_atraksi' => 'required',
            'id_pegawai' => 'required',
            'tgl_pemesanan' => 'required',
            'nama_pengunjung' => 'required',
            'alamat_pengunjung' => 'required',
            'no_telp' => 'required',
            'total_transaksi' => 'required',
            'metode_pembayaran' => 'required',
            'deskripsi' => 'required',
        ]);
        $pemesanan->update([
            'id_hotel'  => $request->id_hotel,
            'id_tempat_wisata'  => $request->id_tempat_wisata,
            'id_objek_atraksi'  => $request->id_objek_atraksi,
            'id_pegawai'  => $request->id_pegawai,
            'tgl_pemesanan'  => $request->tgl_pemesanan,
            'nama_pengunjung'  => $request->nama_pengunjung,
            'alamat_pengunjung'  => $request->alamat_pengunjung,
            'no_telp'  => $request->no_telp,
            'total_transaksi'  => $request->total_transaksi,
            'metode_pembayaran'  => $request->metode_pembayaran,
            'catatan' => $request->deskripsi,
        ]);
        return redirect("pemesanan")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();
        return redirect("pemesanan")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $pemesanan =  Pemesanan::join('hotel', 'hotel.id_hotel', '=', 'pemesanan.id_hotel')
        ->join('tempat_wisata', 'tempat_wisata.id_tempat_wisata', '=', 'pemesanan.id_tempat_wisata')
        ->join('objek_atraksi', 'objek_atraksi.id_objek_atraksi', '=', 'pemesanan.id_objek_atraksi')
        ->join('pegawai', 'pegawai.id_pegawai', 'pemesanan.id_pegawai')
        ->select('pemesanan.*', 'hotel.nama as nama_hotel', 'tempat_wisata.nama as nama_wisata', 'objek_atraksi.nama as nama_objek', 'pegawai.nama as nama_pegawai')
        ->get();
        $pdf = Pdf::loadview('pemesanan/laporan-pemesanan', ['pemesanan' => $pemesanan])->setPaper('a4');
        return $pdf->download('laporan-pemesanan.pdf');
    }
}
