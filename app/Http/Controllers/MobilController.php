<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Mobil $mobil)
    {
        //
        $data = [
            'mobil' => $mobil->all()
        ];

        return view('mobil.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Mobil $mobil)
    {
        $mobil = $mobil->all();
        $data = [
            'mobil' => $mobil,
        ];

        return view('mobil.tambah', [
            'mobil' => $mobil,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mobil $mobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobil $mobil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobil $mobil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {
        //
    }
}
