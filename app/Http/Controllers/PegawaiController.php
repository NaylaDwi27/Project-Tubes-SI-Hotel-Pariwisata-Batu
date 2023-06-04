<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
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
            $pegawai = Pegawai::latest()->paginate(10);
            return view('pegawai/pegawai', compact('pegawai'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            return view('pegawai/tambah-pegawai');
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
            'alamat' => 'required',
            'no_telp' => 'required',
            'tingkatan' => 'required',
            'username' => 'required',
            'password' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $image = $request->file('image');
        $image->storeAs('public/foto-pegawai', $image->hashName());
        Pegawai::create([
            'nama'  => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'role' => $request->tingkatan,
            'username' => $request->username,
            'password' => $request->password,
            'foto' => $image->hashName(),
        ]);
        return redirect("pegawai")->with("message", "Data berhasil disimpan");
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
    public function edit(Pegawai $pegawai)
    {
        if (!Session::get('logged_in_pegawai')) {
            return redirect('login');
        } else {
            return view('pegawai/edit-pegawai', compact('pegawai'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'tingkatan' => 'required',
            'username' => 'required',
            'password' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/foto-pegawai', $image->hashName());

            //delete old image
            Storage::delete('public/foto-pegawai/' . $pegawai->image);

            //update post with new image
            $pegawai->update([
                'nama'  => $request->nama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'role' => $request->tingkatan,
                'username' => $request->username,
                'password' => $request->password,
                'foto' => $image->hashName(),
            ]);
        } else {
            $pegawai->update([
                'nama'  => $request->nama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'role' => $request->tingkatan,
                'username' => $request->username,
                'password' => $request->password,
            ]);
        }
        return redirect("pegawai")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect("pegawai")->with("message", "Data berhasil dihapus");
    }

    public function print()
    {
        $pegawai = Pegawai::get();
        $pdf = Pdf::loadview('pegawai/laporan-pegawai', ['pegawai' => $pegawai])->setPaper('a4');
        return $pdf->download('laporan-pegawai.pdf');
    }

}
