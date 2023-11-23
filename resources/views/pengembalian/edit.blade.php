@extends('layout.layout')
@section('title', 'Edit Pengembalian ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Pengembalian
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="update">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                {{-- <div class="form-group">
                                    <label>PILIH KENDARAAN</label>
                                    <td class="fw-bolder">MOBIL</td>
                                                    <td>: {{$p->merk . ' ' . $p->nomor_rangka }}</td>
                                </div> --}}

                                <div class="form-group">
                                    <label>TANGGAL PENGEMBALIAN</label>
                                    <input type="date" class="form-control" name="tanggal_pengembalian"
                                        value="{{ $info->tanggal_pengembalian }}" />
                                </div>
                                <input type="hidden" class="form-control" name="id_pengembalian"
                                    value="{{ $info->id_pengembalian }}" />
                                <div class="col-md-4 mt-3">
                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                                    <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection