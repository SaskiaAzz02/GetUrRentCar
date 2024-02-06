<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index(Pengembalian $pengembalian)
    {
        $data = [
            'pengembalian' => $pengembalian->all()
        ];
        return view('pengembalian.index', $data);

    }

    public function create(Pengembalian $pengembalian)
    {
        $pengembalian = $pengembalian->all();
        $data = [
            'pengembalian' => $pengembalian,
        ];

        return view('pengembalian.tambah', [
            'pengembalian' => $pengembalian,
        ]);
    }

    public function store(Request $request, Pengembalian $pengembalian)
    {
        $request->validate([
            'tanggal_pengembalian' => 'required',
        ]);

        $pengembalian = new Pengembalian();

        $pengembalian->tanggal_pengembalian = $request->tanggal_pengembalian;

        $pengembalian->save();

        return redirect('/pengembalian');
    }

    public function edit(Pengembalian $pengembalian, string $id)
    {
        $data = [
            'pengembalian' => Pengembalian::where('id_pengembalian', $id)->get()
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