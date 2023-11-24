<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Penyewaan;
use Barryvdh\DomPDF\Facade\pdf;
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

    public function detail(penyewaan $penyewaan, string $id)
    {
        $data = Penyewaan::where('id_penyewaan', $id)->get();

        $data = [
            'info' => DB::table('penyewaan')
                ->join('mobil', 'penyewaan.id_detail', '=', 'mobil.id_mobil')
                ->get(),
        ];

        return view('penyewaan.detail', ['penyewaan' => $data]);
    }

    public function unduh(penyewaan $penyewaan)
    {
    	$penyewaan = penyewaan::all();
 
    	$pdf = PDF::loadview('penyewaan.unduh',['penyewaan'=>$penyewaan]);
    	return $pdf->download('laporan-penyewaan.pdf');
    }

    public function create(penyewaan $mobil, Penyewaan $penyewaan)
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

    public function edit(Penyewaan $penyewaan, string $id, mobil $mobil)
    {
        $jenis_mobil = DB::table('jenis_mobil')->get(); 

        $data = [
            'info' => $penyewaan
                ->join('mobil', 'penyewaan.id_detail', '=', 'mobil.id_mobil')
                ->where('penyewaan.id_penyewaan', $id)
                ->first(),
                'mobil' => $mobil->all(),
        ];

        return view('penyewaan.edit', $data);
    }

    public function update(Request $request, Penyewaan $penyewaan)
    {
        $id_penyewaan = $request->input('id_penyewaan');

        $data = $request->validate([
            'id_detail' => 'sometimes',
            'tanggal_peminjaman' => 'sometimes|date',
            'jumlah_sewa' => 'sometimes|integer',
        ]);

        if ($id_penyewaan !== null) {
            try{
                $dataUpdate = $penyewaan->where('id_penyewaan', $id_penyewaan)->update($data);
                return redirect('/penyewaan');
            }catch(Exception $e){
                dd($e->getMessage());
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
