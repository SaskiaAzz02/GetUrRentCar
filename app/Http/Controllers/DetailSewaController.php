<?php

namespace App\Http\Controllers;

use App\Models\DetailSewa;
use Illuminate\Http\Request;

class DetailSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DetailSewa $detailSewa)
    {
        //
        $data = [
            'detailSewa' => $detailSewa->all()
        ];

        return view('detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DetailSewa $detailSewa)
    {
        $detailSewa = $detailSewa->all();
        $data = [
            'detailSewa' => $detailSewa,
        ];

        return view('detail.tambah', [
            'detailSewa' => $detailSewa,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, DetailSewa $detailSewa)
    {
        $data = $request->validate([
            'lampu' => 'required',
            'dongkrak_kit' => 'required',
            'klakson' => 'required',
            'head_rest' => 'required',
            'kebersihan_mobil' => 'required',
            'seat_belt' => 'required',
            'audio' => 'required',
            'karpet_mobil' => 'required',
            'ban_serep' => 'required',
            'stnk' => 'required',
            'foto_kondisi_mobil' => 'required|file',
        ]);

        // $user = Auth::user();
        // $data['id_user'] = $user->id_user;

        if ($request->hasFile('foto_kondisi_mobil')) {
            $foto_file = $request->file('foto_kondisi_mobil');
            $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['foto_kondisi_mobil'] = $foto_nama;
        }

        if ($detailSewa->create($data)) {
            return redirect('detail')->with('success', 'Detail sewa baru berhasil ditambah');
        }

        return back()->with('error', 'Detail sewa gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailSewa $detailSewa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailSewa $detailSewa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailSewa $detailSewa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailSewa $detailSewa)
    {
        //
    }
}
