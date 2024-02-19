@extends('layout.layout')
@section('title', 'Tambah Pembayaran ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Lakukan Pembayaran
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>YANG DIKEMBALIKAN</label>
                                    <select name="id_pengembalian" id="" class="form-control">
                                        <option value="" selected disabled>Pilih Mobil</option>
                                        @foreach ($pembayaran as $p)
                                        <option value="{{ $p->id_pengembalian }}">
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>TOTAL MOBIL</label>
                                    <input type="text" class="form-control" name="total_mobil" />
                                </div>
                                <div class="form-group">
                                    <label>TANGGAL PENGEMBALIAN</label>
                                    <input type="date" class="form-control" name="tanggal_pengembalian" />
                                </div>
                                <div class="form-group">
                                    <label>JENIS PEMBAYARAN</label>
                                    <select name="id_pengembalian" id="" class="form-control">
                                        <option value="" selected disabled>Pilih Jenis</option>
                                        @foreach ($pembayaran as $p)
                                        <option value="{{ $p->id_pembayaran }}">
                                        </option>
                                        @endforeach
                                    </select>
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