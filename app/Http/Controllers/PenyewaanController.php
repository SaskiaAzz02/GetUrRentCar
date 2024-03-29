<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Penyewaan;
use Barryvdh\DomPDF\Facade\pdf;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyewaanController extends Controller
{
    public function index(Penyewaan $penyewaan, Log $log)
    {
        $totalPenyewaan = DB::select('SELECT CountTotalPenyewaan() AS totalPenyewaan')[0]->totalPenyewaan;

        $data = [
            'info' => $penyewaan
                ->join('mobil', 'penyewaan.id_mobil', '=', 'mobil.id_mobil')
                ->get(),
                'log' => $log->all(),
            'jumlahPenyewaan' => $totalPenyewaan
        ];

        return view('penyewaan.index', $data);
    }

    public function create(Mobil $mobil, Penyewaan $penyewaan)
    {
        // $data = Penyewaan::where('id_penyewaan', $id)->get();

        $data = [
            'info' => DB::table('penyewaan')
                ->join('mobil', 'penyewaan.id_mobil', '=', 'mobil.id_mobil')
                ->get(),
                'mobil' => $mobil->all(),
        ];

        return view('penyewaan.tambah', $data);
    }

    public function unduh(penyewaan $penyewaan)
    {
    	$penyewaan = penyewaan::all();
 
    	$pdf = PDF::loadview('penyewaan.unduh',['penyewaan'=>$penyewaan]);
    	return $pdf->download('laporan-penyewaan.pdf');
    }


    public function store(Request $request, Penyewaan $penyewaan)
    {
        $request->validate([
            'id_mobil' => 'required',
            // 'pilih_merk_mobil' => 'required',
            'tanggal_peminjaman' => 'required',
            'jumlah_sewa' => 'required',
        ]);

        $penyewaan = new Penyewaan();

        $penyewaan->id_mobil = $request->id_mobil;
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
        $dataMobil = $mobil->all(); 

        $data = [
            'info' => $penyewaan
                ->where('id_penyewaan', $id)
                ->first(),
            'jenis_mobil' => $jenis_mobil,
        ];

        return view('penyewaan.edit', $data);
    }

     // DETAIL

     public function detail(Penyewaan $penyewaan, string $id)
     {
         $data = Penyewaan::where('id_penyewaan', $id)->get();
         return view('penyewaan.detail', ['penyewaan' => $data]);
     }

    public function update(Request $request, Penyewaan $penyewaan)
    {
        $id_penyewaan = $request->input('id_penyewaan');

        $data = $request->validate([
            'id_mobil' => 'required',
            'tanggal_peminjaman' => 'required|date',
            'jumlah_meminjam' => 'required|integer',
        ]);

        if ($id_penyewaan !== null) {
            $dataUpdate = $penyewaan->where('id_penyewaan', $id_penyewaan)->update($data);

            try {
                if($dataUpdate) {
                    return redirect('/penyewaan');
                }
            } catch (Exception $e) {
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
                'pesan'   => 'Data penyewaan berhasil dihapus'
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
