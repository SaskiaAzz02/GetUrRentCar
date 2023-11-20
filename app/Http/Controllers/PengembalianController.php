<?php

namespace App\Http\Controllers;

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
}