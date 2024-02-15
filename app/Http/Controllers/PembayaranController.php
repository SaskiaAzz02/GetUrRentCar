<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Pembayaran;
use Barryvdh\DomPDF\Facade\pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index(Pembayaran $pembayaran, Log $log)
    {

        //
        $data = [
            'pembayaran' => $pembayaran->all(),
            'log' => $log->all(),
        ];

        // dd(Auth::user());`
        return view('pembayaran.index', $data);
    }
}
