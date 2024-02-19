@extends('layout.layout')
@section('title', 'Edit Pembayaran ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Pembayaran
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_pembayaran"
                                    value="{{ $pembayaran->id_pembayaran }}" />
                                    <label>YANG DIKEMBALIKAN</label>
                                    <select name="id_pengembalian" id="" class="form-control">
                                        {{-- <option value="" selected disabled>Pilih Pengembalian</option> --}}
                                        @foreach ($pengembalian as $s)
                                        <option value="{{ $s->id_pengembalian }}"
                                            {{ $pengembalian_before->id_pengembalian == $s->id_pengembalian ? 'selected' : '' }}>
                                            {{ $s->merk }} {{ $s->plat_mobil }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>TOTAL MOBIL</label>
                                    <input type="text" value="{{$pembayaran->total}}" class="form-control" name="total" />
                                </div>
                                <div class="form-group">
                                    <label>TANGGAL PEMBAYARAN</label>
                                    <input type="date"  value="{{$pembayaran->tanggal_pembayaran}}"  class="form-control" name="tanggal_pembayaran" />
                                </div>
                                <div class="form-group">
                                    <label>JENIS PEMBAYARAN</label>
                                    <select name="jenis_pembayaran" id="" class="form-control">
                                        <option value="" selected disabled>Pilih Jenis</option>
                                        <option value="BCA" @if($pembayaran->jenis_pembayaran=='BCA') selected @endif>BCA</option>
                                        <option value="Dana"  @if($pembayaran->jenis_pembayaran=='Dana') selected @endif>Dana</option>
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