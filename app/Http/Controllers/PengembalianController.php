<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Penyewaan;
use App\Models\Pengembalian;
use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index(Pengembalian $pengembalian, Mobil $mobil, Log $log)
    {
        $totalPengembalian = DB::select('SELECT CountTotalPengembalian() AS totalPengembalian')[0]->totalPengembalian;
        $data = [
            'pengembalian' => $pengembalian
            ->join('mobil', 'pengembalian.id_mobil', 'mobil.id_mobil')->get(),
            'log' => $log->all(),
            'jumlahPengembalian'=>$totalPengembalian
        ];

        // dd($data);
        return view('pengembalian.index', $data);

    }

    public function create(Pengembalian $pengembalian, Mobil $mobil)
    {
        $data_pengembalian = $pengembalian->all();
        $data_mobil = $mobil->all();
        return view('pengembalian.tambah', [
            'pengembalian' => $data_pengembalian,
            'mobil' => $data_mobil
        ]);
    }

    public function store(Request $request, Pengembalian $pengembalian)
    {

        // dd($request->all());

        $request->validate([
        ]);

        $data = [
            'id_mobil' => $request->input('id_mobil'),
            'tanggal_pengembalian' => $request->input('tanggal_pengembalian'),
            ];

        $pengembalian = new Pengembalian();

        $pengembalian->id_mobil = $request->id_mobil;
        $pengembalian->tanggal_pengembalian = $request->tanggal_pengembalian;

        $pengembalian->save();

        return redirect('/pengembalian');

        if ($pengembalian->create($data)) {
            return redirect('pengembalian')->with('success', 'Data sewa baru berhasil ditambah');
        }

        return back()->with('error', 'Data sewa gagal ditambahkan');
    }

    public function edit(Pengembalian $pengembalian, string $id)
    {
        $data = [
            'pengembalian' => Pengembalian::where('id_pengembalian', $id)->first()
        ];
        return view('pengembalian.edit', $data);
    }

    // DETAIL

    public function detail(Pengembalian $pengembalian, string $id)
    {
        $data = Pengembalian::where('id_pengembalian', $id)->get();
        return view('pengembalian.detail', ['pengembalian' => $data]);
    }

    // UNDUH

    public function unduh(Pengembalian $pengembalian)
    {
    	$pengembalian = Pengembalian::all();
 
    	$pdf = PDF::loadview('pengembalian.unduh',['pengembalian'=>$pengembalian]);
    	return $pdf->download('laporan-pengembalian.pdf');
    }

    // Hapus 

    public function destroy(Request $request, Pengembalian $pengembalian)
    {

    $id_pengembalian = $request->input('id_pengembalian');

    $aksi = $pengembalian->where('id_pengembalian', $id_pengembalian)->delete();

    if ($aksi) {
        // Pesan Berhasil
        $pesan = [
            'success' => true,
            'pesan'   => 'Data pengembalian berhasil dihapus'
        ];
    } else {
        // Pesan Gagal
        $pesan = [
            'success' => false,
            'pesan'   => 'Data gagal dihapus'
        ];
        return response()->json($pesan);

    }
} 
}