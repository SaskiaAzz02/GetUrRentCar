<?php

namespace App\Http\Controllers;

use App\Models\JenisMobil;
use App\Models\Log;
use App\Models\Mobil;
use Barryvdh\DomPDF\Facade\pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Mobil $mobil, Log $log)
    {

        $totalMobil = DB::select('SELECT CountTotalMobil() AS totalMobil')[0]->totalMobil;
        //
        $data = [
            'mobil' => $mobil->all(),
            'log' => $log->all(),
            'jumlahMobil' => $totalMobil
        ];

        // dd(Auth::user());`
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
            'jenis_mobil'=> JenisMobil::all()
        ];

        return view('mobil.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Mobil $mobil)
    {
        $data = $request->validate([
            'jenis_mobil' => 'required',
            'merk' => 'required',
            'plat_mobil' => 'required',
            'nomor_rangka' => 'required',
            'foto_mobil' => 'required|file',
            'harga_sewa_per_hari' => 'required',
        ]);

        // $user = Auth::user();
        // $data['id_user'] = $user->id_user;

        if ($request->hasFile('foto_mobil')) {
            $foto_file = $request->file('foto_mobil');
            $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['foto_mobil'] = $foto_nama;
        }

        if ($mobil->create($data)) {
            return redirect('mobil')->with('success', 'Data Mobil baru berhasil ditambah');
        }

        return back()->with('error', 'Data mobil gagal ditambahkan');

        if (DB::statement("CALL CreateMobil(?,?,?,?,?,?)", [$data['jenis_mobil'], $data['merk'],  $data['plat_mobil'], $data['nomor_rangka'], $data['foto_mobil'], $data['harga_sewa_per_hari']])) {
            return redirect('/mobil')->with('success', 'Data Mobil Baru Berhasil Ditambah');
        }
        return back()->with('error','Data Mobil Gagal Ditambahkan');

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
    public function edit(Mobil $mobil, string $id)
    {
        $data = [
            'mobil' => Mobil::where('id_mobil', $id)->get()
        ];
        return view('mobil.edit', $data);
    }

    // DETAIL

    public function detail(Mobil $mobil, string $id)
    {
        $data = Mobil::where('id_mobil', $id)->get();
        return view('mobil.detail', ['mobil' => $data]);
    }

    // UNDUH

    public function unduh(Mobil $mobil)
    {
    	$mobil = Mobil::all();
 
    	$pdf = PDF::loadview('mobil.unduh',['mobil'=>$mobil]);
    	return $pdf->download('laporan-mobil.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobil $mobil)
    {
        $id_mobil = $request->input('id_mobil');

        $data = $request->validate([
            'jenis_mobil' => 'sometimes',
            'merk' => 'sometimes',
            'plat_mobil' => 'sometimes',
            'nomor_rangka' => 'sometimes',
            'foto_mobil' => 'sometimes|file',
            'harga_sewa_per_hari' => 'sometimes',
        ]);

        if ($id_mobil !== null) {
            if ($request->hasFile('file')) {
                $foto_mobil = $request->file('file');
                $foto_extension = $foto_mobil->getClientOriginalExtension();
                $foto_nama = md5($foto_mobil->getClientOriginalName() . time()) . '.' . $foto_extension;
                $foto_mobil->move(public_path('foto'), $foto_nama);

                $update_data = $mobil->where('id_mobil', $id_mobil)->first();
                File::delete(public_path('foto') . '/' . $update_data->file);

                $data['foto_mobl'] = $foto_nama;
            }

            $dataUpdate = $mobil->where('id_mobil', $id_mobil)->update($data);

            if ($dataUpdate) {
                return redirect('mobil')->with('success', 'Data mobil berhasil diupdate');
            }

            return back()->with('error', 'Data jenis mobil gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Mobil $mobil)
    {
        $id_mobil = $request->input('id_mobil');

        // Hapus 
        $aksi = $mobil->where('id_mobil', $id_mobil)->delete();

        if ($aksi) {
            // Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan'   => 'Data mobil berhasil dihapus'
            ];
        } else {
            // Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'   => 'Data gagal dihapus'
            ];
        }

        return response()->json($pesan);
    }
}
