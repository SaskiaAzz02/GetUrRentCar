@extends('layout.layout')
@section('title', 'Data Penyewaan')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        DETAIL DATA PENYEWAAN
                </div>
                <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                <div class="container">
                                    @foreach ($penyewaan as $p)
                                        @if ($p->file)
                                        <div class="photo-container" style="margin-top:-20px">
                                            <br>
                                            <img src="{{ url('foto') . '/' . $i->file }} "style="max-width: 170px; height: auto;" />                                </div>
                                        @endif
                                        <table class="table table-bordered mt-3">
                                            <tbody>
                                            <tr>
                                                    <td class="fw-bolder">ID PENYEWAAN</td>
                                                    <td>: {{$p->id_penyewaan}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">MOBIL</td>
                                                    <td>: {{ $p->merk . ' ' . $p->plat_mobil }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">TANGGAL PEMINJAMAN</td>
                                                    <td>: {{$p->tanggal_peminjaman}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">JUMLAH MEMINJAM</td>
                                                    <td>: {{$p->jumlah_sewa}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-md-4 mt-3">
                                    <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a>
                                        </div>
                                    </div>

                                    @csrf
                                </div>

                            </div>
                        </div>
                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
