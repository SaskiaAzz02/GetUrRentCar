@extends('layout.layout')
@section('title', ' Edit Data Mobil ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Mobil
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
                                    <label>MERK</label>
                                    <input type="text" class="form-control" name="merk" />
                                </div>
                                <div class="form-group">
                                    <label>PLAT MOBIL</label>
                                    <input type="text" class="form-control" name="plat_mobil" />
                                </div> <div class="form-group">
                                    <label>NOMOR RANGKA</label>
                                    <input type="text" class="form-control" name="nomor_rangka" />
                                </div>
                                <div class="form-group">
                                    <label>FOTO MOBIL</label>
                                    <input type="file" class="form-control" name="foto_mobil" />
                                </div>  </div> <div class="form-group">
                                    <label>HARGA SEWA PER HARI</label>
                                    <input type="text" class="form-control" name="harga_sewa_per_hari" />
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