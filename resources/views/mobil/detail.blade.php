@extends('layout.layout')
@section('title', 'Data Mobil')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        DETAIL DATA MOBIL
                </div>
                <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                <div class="container">
                                    @foreach ($mobil as $m)
                                        @if ($m->file)
                                        <div class="photo-container" style="margin-top:-20px">
                                            <br>
                                            <img src="{{ url('foto') . '/' . $i->file }} "style="max-width: 170px; height: auto;" />                                </div>
                                        @endif
                                        <table class="table table-bordered mt-3">
                                            <tbody>
                                        
                                                <tr>
                                                    <td class="fw-bolder">JENIS MOBIL</td>
                                                    <td>: {{$m->jenis_mobil}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">MERK</td>
                                                    <td>: {{$m->merk}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">PLAT MOBIL</td>
                                                    <td>: {{$m->plat_mobil}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">NOMOR RANGKA</td>
                                                    <td>: {{$m->nomor_rangka}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">FOTO MOBIL</td>
                                                    <td>: {{$m->foto_mobil}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">HARGA SEWA PER HARI</td>
                                                    <td>: {{$m->harga_sewa_per_hari}}</td>
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
