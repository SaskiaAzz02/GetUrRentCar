<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Log;
use Barryvdh\DomPDF\Facade\pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index(Pembayarans $pembayarans)
    {

        //
        $data = [
            'pembayarans' => $pembayarans->all(),
        ];

        // dd(Auth::user());`
        return view('pembayaran.index', $data);
    }
}
