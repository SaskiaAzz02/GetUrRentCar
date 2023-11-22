<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyewaanController extends Controller
{
    public function index(Penyewaan $penyewaan)
    {
        $data = [
            'info' => $penyewaan
                ->join('mobil', 'penyewaan.id_detail', '=', 'mobil.id_mobil')
                ->get()
        ];

        return view('penyewaan.index', $data);
    }

    public function create(Mobil $mobil, Penyewaan $penyewaan)
    {
        $data = [
            'info' => DB::table('penyewaan')
                ->join('mobil', 'penyewaan.id_detail', '=', 'mobil.id_mobil')
                ->get(),
                'mobil' => $mobil->all(),
        ];
        // dd($data);

        return view('penyewaan.tambah', $data);
    }

    public function store(Request $request, Penyewaan $penyewaan)
    {
        $request->validate([
            'id_detail' => 'required',
            // 'pilih_merk_mobil' => 'required',
            'tanggal_peminjaman' => 'required',
            'jumlah_sewa' => 'required',
        ]);

        $penyewaan = new Penyewaan();

        $penyewaan->id_detail = $request->id_detail;
        $penyewaan->tanggal_peminjaman = $request->tanggal_peminjaman;
        $penyewaan->jumlah_sewa = $request->jumlah_sewa;

        $penyewaan->save();

        return redirect('/penyewaan');
        
        if ($penyewaan->create($request)) {
            return redirect('penyewaan')->with('success', 'Data sewa baru berhasil ditambah');
        }

        return back()->with('error', 'Data sewa gagal ditambahkan');
    
    }

    public function edit(Penyewaan $penyewaan, string $id)
    {
        $jenis_mobil = DB::table('jenis_mobil')->get(); 

        $data = [
            'info' => $penyewaan
                ->join('mobil', 'penyewaan.id_detail', '=', 'mobil.id_mobil')
                ->where('penyewaan.id_penyewaan', $id)
                ->first(),
            'jenis_mobil' => $jenis_mobil,
        ];

        return view('penyewaan.edit', $data);
    }

    public function update(Request $request, Penyewaan $penyewaan)
    {
        $id_penyewaan = $request->input('id_penyewaan');

        $data = $request->validate([
            'id_detail' => 'required',
            'tanggal_peminjaman' => 'required|date',
            'jumlah_meminjam' => 'required|integer',
        ]);

        if ($id_penyewaan !== null) {
            $dataUpdate = $penyewaan->where('id_penyewaan', $id_penyewaan)->update($data);

            if ($dataUpdate) {
                return redirect('/penyewaan');
            }
        }

    }

    public function destroy(Penyewaan $penyewaan, Request $request)
    {
        $id_penyewaan = $request->input('id_penyewaan');

        // Hapus 
        $aksi = $penyewaan->where('id_penyewaan', $id_penyewaan)->delete();

        if ($aksi) {
            // Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan'   => 'Data jenis surat berhasil dihapus'
            ];
        } else {
            // Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'   => 'Data gagal dihapus'
            ];
        }

        return response()->json($pesan);
    }


}
