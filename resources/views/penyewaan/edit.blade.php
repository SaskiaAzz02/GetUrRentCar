@extends('layout.layout')
@section('title', 'EDIT Sewa ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        EDIT Data Sewa
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="update">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>PILIH KENDARAAN</label>
                                    <select name="id_detail" class="form-control">
                                        <option value="" disabled>Pilih Jenis</option>
                                        @foreach ($mobil as $s)
                                        <option value="{{ $s->id_mobil }}">{{ $s->plat_mobil }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>TANGGAL PEMINJAMAN</label>
                                    <input type="date" class="form-control" name="tanggal_peminjaman"
                                        value="{{ $info->tanggal_peminjaman }}" />
                                </div>
                                <div class="form-group">
                                    <label>JUMLAH MEMINJAM</label>
                                    <input type="number" class="form-control" name="jumlah_meminjam"
                                        value="{{ $info->jumlah_meminjam }}" />
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