@extends('layout.layout')
@section('title', 'EDIT Sewa ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Sewa
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="update">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>PILIH MOBIL</label>
                                    <select name="id_mobil" id="" class="form-control">
                                        <option value="" selected disabled> Pilih Jenis</option>
                                        @foreach ($mobil as $m)
                                        <option value="{{ $m->id_mobil }}">
                                            {{ $m->plat_mobil }}
                                        </option>
                                        @endforeach
                                    </select>
                                    {{-- <label>PILIH MERK MOBIL</label>
                                    <input type="text" class="form-control" name="pilih_merk_mobil" /> --}}
                                </div>

                                <div class="form-group">
                                    <label>TANGGAL PEMINJAMAN</label>
                                    <input type="date" class="form-control" name="tanggal_peminjaman"
                                        value="{{ $info->tanggal_peminjaman }}" />
                                </div>
                                <div class="form-group">
                                    <label>JUMLAH MEMINJAM</label>
                                    <input type="number" class="form-control" name="jumlah_sewa"
                                        value="{{ $info->jumlah_sewa }}" />
                                </div>
                                <input type="hidden" class="form-control" name="id_penyewaan"
                                    value="{{ $info->id_penyewaan }}" />
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