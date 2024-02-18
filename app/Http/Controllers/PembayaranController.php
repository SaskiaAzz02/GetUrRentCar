<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Log;
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

    public function create(Pembayaran $pembayaran)
    {
        $mobil = $pembayaran->all();
        $data = [
            'pembayaran' => $pembayaran,
        ];

        return view('pembayaran.tambah', $data);
    }
}
