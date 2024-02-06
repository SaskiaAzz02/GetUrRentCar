@extends('layout.layout')
@section('title', 'Tambah Pengembalian ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Pengembalian
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>PILIH KENDARAAN</label>
                                    <select name="id_mobil" id="" class="form-control">
                                        <option value="" selected disabled>Pilih Jenis</option>
                                        @foreach ($mobil as $s)
                                        <option value="{{ $s->id_mobil }}">{{ $s->merk }} {{ $s->plat_mobil }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>TANGGAL PENGEMBALIAN</label>
                                    <input type="date" class="form-control" name="tanggal_pengembalian" />
                                </div>
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