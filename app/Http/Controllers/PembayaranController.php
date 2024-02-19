<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;

use App\Models\Mobil;
use App\Models\Log;
use App\Models\Pengembalian;
use Barryvdh\DomPDF\Facade\pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index(Pembayaran $pembayaran, Log $log)
    {

        //
        $totalPembayaran = DB::select('SELECT CountTotalPembayaran() AS totalPembayaran')[0]->totalPembayaran;
        $data = [
            'pembayaran' => $pembayaran->all(),
            'log' => $log->all(),
            'jumlahPembayaran'=>$totalPembayaran
        ];

        // dd(Auth::user());`
        return view('pembayaran.index', $data);
    }

    public function create(Pengembalian $pengembalian, Pembayaran $pembayaran)
    {
        $data = [
            'pengembalian' => $pengembalian
            ->join('mobil', 'pengembalian.id_mobil', '=', 'mobil.id_mobil')    
            ->get(),
            'pembayaran' => $pembayaran->all()
        ];

        // dd($data);
        return view('pembayaran.tambah', $data);
    }

    public function store(Request $request, Pembayaran $pengembalian)
    {
        $request->validate([
            'id_pengembalian' => 'required',
            'total_mobil' => 'required',
            'tanggal_pengembalian' => 'required',
            'jenis_pembayaran' => 'required',
        ]);

        $pembayaran = new Pembayaran();

        $pembayaran->id_pengambalian = $request->id_pengembalian;
        $pembayaran->total_mobil = $request->total_mobil;
        $pembayaran->tanggal_peminjaman = $request->tanggal_peminjaman;
        $pembayaran->jenis_pembayaran = $request->jumlah_sewa;

        $pembayaran->save();

        return redirect('/pembayaran');
        
        if ($pembayaran->create($request)) {
            return redirect('pembayaran')->with('success', 'Data pembayaran baru berhasil ditambah');
        }

        return back()->with('error', 'Data pembayaran gagal ditambahkan');
    
    }

     // EDIT

     public function edit(Pembayaran $pembayaran, string $id)
     {
         $data = [
             'pengembalian' => Pengembalian::where('id_pengembalian', $id)->first(),
             'mobil'=> Mobil::all()
         ];
         return view('pembayaran.edit', $data);
     }
}
