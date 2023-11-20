@extends('layout.layout')
@section('title', 'Tambah Mobil ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Mobil
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>JENIS MOBIL</label>
                                    <input type="text" class="form-control" name="jenis_mobil" />
                                    @csrf
                                </div>
                                <div class="form-group">
                                    <label>MODEL</label>
                                    <select name="model" class="form-control">
                                        @foreach ($mobil as $mobil)
                                            <option value="{{ $jenis->id_jenis_surat }}">{{ $jenis->jenis_surat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ringkasan</label>
                                    <input type="text" class="form-control" name="ringkasan" />
                                </div>
                                <div class="form-group">
                                    <label>Foto Mobil</label>
                                    <input type="file" class="form-control" name="file" />
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