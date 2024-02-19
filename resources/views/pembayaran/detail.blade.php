@extends('layout.layout')
@section('title', 'Data Pembayaran')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        DETAIL DATA PEMBAYARAN
                </div>
                <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                <div class="container">
                                    @foreach ($pembayaran as $p)
                                        @if ($p->file)
                                        <div class="photo-container" style="margin-top:-20px">
                                            <br>
                                            <img src="{{ url('foto') . '/' . $i->file }} "style="max-width: 170px; height: auto;" />                                </div>
                                        @endif
                                        <table class="table table-bordered mt-3">
                                            <tbody>
                                            <tr>
                                                    <td class="fw-bolder">YANG DIKEMBALIKAN</td>
                                                    <td>: {{$p->id_pembayaran}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">TOTAL MOBIL</td>
                                                    <td>: {{ $p->total_mobil}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">TANGGAL PEMBAYARAN</td>
                                                    <td>: {{$p->tanggal_pembayaran}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">JENIS PEMBAYARAN</td>
                                                    <td>: {{$p->jenis_pembayaran}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @endforeach
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
