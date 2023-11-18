<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    //
    public function index(Penyewaan $penyewaan)
    {
        // $data = [
        //     'penyewaan' => $penyewaan->with('jenis_mobil')->get()
        // ];
        return view('penyewaan.index');
    }

    public function create()
    {
        return view('penyewaan.tambah');
    }

}