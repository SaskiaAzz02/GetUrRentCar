<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    //
    public function index(Penyewaan $penyewaan)
    {
        $data = [
            'penyewaan' => $penyewaan->all()
        ];

        return view('penyewaan.index', $data);
    }

    public function create()
    {
        return view('penyewaan.tambah');
    }

}