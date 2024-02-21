<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Mobil;
use App\Models\Log;
use App\Models\Pengembalian;
use PDF;
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
           'pengembalian'=>$pengembalian->join('mobil',
           'pengembalian.id_pengembalian','=','mobil.id_mobil')->get()
        ];

        // dd($data);
        return view('pembayaran.tambah', $data);
    }

    // MENYIMPAN DATA SETELAH TAMBAH
    public function store(Request $request, Pembayaran $pengembalian)
    {
        // dd($request->all());

        $request->validate([
            'id_pengembalian' => 'required',
            'total' => 'required',
            'tanggal_pembayaran' => 'required',
            'jenis_pembayaran' => 'required',
        ]);

        $pembayaran = new Pembayaran();

        $pembayaran->id_pengembalian = $request->id_pengembalian;
        $pembayaran->total = $request->total;
        $pembayaran->tanggal_pembayaran = $request->tanggal_pembayaran;
        $pembayaran->jenis_pembayaran = $request->jenis_pembayaran;

        $pembayaran->save();

        return redirect('/pembayaran');
        
        if ($pembayaran->create($request)) {
            return redirect('pembayaran')->with('success', 'Data pembayaran baru berhasil ditambah');
        }

        return back()->with('error', 'Data pembayaran gagal ditambahkan');
    
    }

     // EDIT

     public function edit(String $id, Pengembalian $pengembalian, Pembayaran $pembayaran)
     {
        $id_pengembalian=DB::table('pembayaran')->select('id_pengembalian')->where('id_pembayaran', $id)->first();
        $data = [
            'pengembalian_before' => $pengembalian
            ->join('mobil', 'pengembalian.id_mobil', '=', 'mobil.id_mobil')
            ->where('id_pengembalian', $id_pengembalian->id_pengembalian)
            ->first(),
            'pengembalian'=>$pengembalian
            ->join('mobil', 'pengembalian.id_mobil', '=', 'mobil.id_mobil')
            ->get(),
            'pembayaran' => $pembayaran->where('id_pembayaran', $id)->first()
         ];
         return view('pembayaran.edit', $data);
     }

      // DETAIL

    public function detail(Pembayaran $pembayaran, string $id)
    {
        $data = Pembayaran::where('id_pembayaran', $id)->get();
        return view('pembayaran.detail', ['pembayaran' => $data]);
    }

    // MENYIMPAN DATA SETELAH EDIT
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $id_pembayaran = $request->input('id_pembayaran');

        $data = $request->validate([
            'id_pengembalian' => 'required',
            'total' => 'required',
            'tanggal_pembayaran' => 'required|date',
            'jenis_pembayaran' => 'required',
        ]);

        if ($id_pembayaran !== null) {
            $dataUpdate = $pembayaran->where('id_pembayaran', $id_pembayaran)->update($data);
            return redirect('/pembayaran');
            if ($dataUpdate) {
                return redirect('/pembayaran');
            }

    }

    }

    // UNDUH
    public function unduh(Pembayaran $pembayaran)
    {
        $imageDataArray = [];
        $dataPembayaran = $pembayaran::all();
    $data = [
        'pembayaran' => $dataPembayaran
    ];

        foreach($dataPembayaran as $dataGambar){
            if($dataGambar->foto_mobil){
                $imageData = base64_encode(file_get_contents(public_path('foto'). '/' . $dataGambar->foto_mobil));
                $imageSrc = 'data.image/' . pathinfo($dataGambar->foto_mobil, PATHINFO_EXTENSION) . ';base64,' . $imageData;
                $imageDataArray[] = ['src' => $imageSrc, 'alt' => 'foto'];
            }
        }
        $pdf = PDF::setOptions(['isHtmlParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('pembayaran.unduh',['pembayaran'=>$dataPembayaran, 'imageDataArray'=>$imageDataArray]);
        return $pdf->stream('data-mobil.pdf');
    }


    // HAPUS     

    public function destroy(Request $request, Pembayaran $pembayaran)
    {

    $id_pembayaran = $request->input('id_pembayaran');

    $aksi = $pembayaran->where('id_pengembalian', $id_pembayaran)->delete();

    if ($aksi) {
        // Pesan Berhasil
        $pesan = [
            'success' => true,
            'pesan'   => 'Data pembayaran berhasil dihapus'
        ];
    } else {
        // Pesan Gagal
        $pesan = [
            'success' => false,
            'pesan'   => 'Data gagal dihapus'
        ];
        return response()->json($pesan);

    }   
    }

    
}