<?php

namespace App\Http\Controllers;

use App\Models\DetailSewa;
use App\Models\JenisMobil;
use App\Models\mobil;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DetailSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DetailSewa $detailSewa, Log $log)
    {
        $totalDetailSewa = DB::select('SELECT CountTotalDetailSewa() AS totalDetailSewa')[0]->totalDetailSewa;

        $data = [
            'detailSewa' => $detailSewa->all(),
            'log' => $log->all(),
            'jumlahDetailSewa' => $totalDetailSewa
        ];

        return view('detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DetailSewa $detailSewa)
    {
        $detailSewa = $detailSewa->all();
        // $data = [
        //     'detailSewa' => $detailSewa,
        // ];

        $data = [
            'jenis_mobil'=>JenisMobil::all(),
            'merek'=>DB::table('mobil')
            ->select('merk')
            ->get(),
            'plat'=>DB::table('mobil')
            ->select('plat_mobil')
            ->get()
        ];

        return view('detail.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, DetailSewa $detailSewa)
    {

                $request->validate([
            // ... validasi lainnya
        ]);
        
        // Setelah validasi, gunakan data yang telah divalidasi
        $data = [
            'id_detail' => $request->input('id_detail'),
            'id_mobil' => $request->input('id_mobil'),
            'id_jenis_mobil' => $request->input('id_jenis_mobil'),
            'lampu' => $request->input('lampu'),
            'dongkrak_kit' => $request->input('dongkrak_kit'),
            'klakson' => $request->input('klakson'),
            'head_rest' => $request->input('head_rest'),
            'kebersihan_mobil' => $request->input('kebersihan_mobil'),
            'seat_belt' => $request->input('seat_belt'),
            'audio' => $request->input('audio'),
            'karpet_mobil' => $request->input('karpet_mobil'),
            'ban_serep' => $request->input('ban_serep'),
            'stnk' => $request->input('stnk'),
            'merk' => $request->input('merk'),
            'plat' => $request->input('plat'),
        ];
        
        if ($request->hasFile('foto_kondisi_mobil')) {
            $foto_file = $request->file('foto_kondisi_mobil');
            $foto_kondisi_mobil = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_kondisi_mobil);
            $data['foto_kondisi_mobil'] = $foto_kondisi_mobil;
        }
        
        // Simpan data ke database
if ($detailSewa->create($data)) {
    return redirect('/detail')->with('success', 'Detail sewa baru berhasil ditambah');
}

// Jika pembuatan gagal
return back()->with('error', 'Detail sewa gagal ditambahkan');
        // $request->validate([
        //     'id_detail' => 'required',
        //     'id_jenis_mobil' => 'required',
        //     'lampu' => 'required',
        //     'dongkrak_kit' => 'required',
        //     'klakson' => 'required',
        //     'head_rest' => 'required',
        //     'kebersihan_mobil' => 'required',
        //     'seat_belt' => 'required',
        //     'audio' => 'required',
        //     'karpet_mobil' => 'required',
        //     'ban_serep' => 'required',
        //     'stnk' => 'required',
        //     'foto_kondisi_mobil' => 'required|file',
        // ]);

        // if ($request->hasFile('foto_kondisi_mobil')) {
        //     $foto_file = $request->file('foto_kondisi_mobil');
        //     $foto_kondisi_mobil = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
        //     $foto_file->move(public_path('foto'), $foto_kondisi_mobil);
        //     $data['foto_kondisi_mobil'] = $foto_kondisi_mobil;
        // }

        // return redirect('/detail');

        // if ($detailSewa->create($data)) {
        //     return redirect('detail')->with('success', 'Detail sewa baru berhasil ditambah');
        // }

        // return back()->with('error', 'Detail sewa gagal ditambahkan');

        // $request->validate([
        //     'id_mobil' => 'required',
        //     // 'pilih_merk_mobil' => 'required',
        //     'tanggal_peminjaman' => 'required',
        //     'jumlah_sewa' => 'required',
        // ]);

        // $penyewaan = new Penyewaan();

        // $penyewaan->id_mobil = $request->id_mobil;
        // $penyewaan->tanggal_peminjaman = $request->tanggal_peminjaman;
        // $penyewaan->jumlah_sewa = $request->jumlah_sewa;

        // $penyewaan->save();

        // return redirect('/penyewaan');
        
        // if ($penyewaan->create($request)) {
        //     return redirect('penyewaan')->with('success', 'Data sewa baru berhasil ditambah');
        // }

        // return back()->with('error', 'Data sewa gagal ditambahkan');
    
    
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailSewa $detailSewa)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailSewa $detail, Mobil $mobil, JenisMobil $jenis, string $id)
    {
        $dataMobil = $mobil->all(); 
        $jenis = $jenis->all(); 

        $data = [
            'info' => $detail
                ->where('id_detail', $id)
                ->first(),
            'mobil' => $dataMobil,
            'jenis_mobil' => $jenis,
        ];
        return view('detail.edit', $data);
    }

        // DETAIL

    public function detail(DetailSewa $detailSewa, string $id)
    {
        $data = DetailSewa::where('id_detail', $id)->get();
        return view('detail.detail', ['detail' => $data]);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, DetailSewa $detailSewa)
    {

        $id_detail = $request->input('id_detail');


        $data = [
            'id_detail' => $request->input('id_detail'),
            // 'id_mobil' => $request->input('id_mobil'),
            'id_jenis_mobil' => $request->input('id_jenis_mobil'),
            'lampu' => $request->input('lampu'),
            'dongkrak_kit' => $request->input('dongkrak_kit'),
            'klakson' => $request->input('klakson'),
            'head_rest' => $request->input('head_rest'),
            'kebersihan_mobil' => $request->input('kebersihan_mobil'),
            'seat_belt' => $request->input('seat_belt'),
            'audio' => $request->input('audio'),
            'karpet_mobil' => $request->input('karpet_mobil'),
            'ban_serep' => $request->input('ban_serep'),
            'stnk' => $request->input('stnk'),
            'merk' => $request->input('merk'),
            'plat' => $request->input('plat'),
        ];
        
        $dataUpdate = $detailSewa->where('id_detail', $id_detail)->update($data);


        if ($dataUpdate) {
            return redirect('detail')->with('success', 'Data mobil berhasil diupdate');
        }
else {
        return back()->with('error', 'Data jenis mobil gagal diupdate');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailSewa $detailSewa)
    {
        //
    }
}