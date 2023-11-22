@extends('layout.layout')
@section('title', 'Tambah Data Sewa ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Sewa
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>LAMPU</label>
                                    <input type="text" class="form-control" name="lampu" />
                                </div>
                                <div class="form-group">
                                    <label>DONGKRAK KIT</label>
                                    <input type="text" class="form-control" name="dongkrak_kit" />
                                </div> 
                                <div class="form-group">
                                    <label>KLAKSON</label>
                                    <input type="text" class="form-control" name="klakson" />
                                </div> 
                                <div class="form-group">
                                    <label>HEAD REST</label>
                                    <input type="text" class="form-control" name="head_rest" />
                                </div> 
                                <div class="form-group">
                                    <label>KEBERSIHAN MOBIL</label>
                                    <input type="text" class="form-control" name="kebersihan_mobil" />
                                </div> 
                                <div class="form-group">
                                    <label>SEAT BELT</label>
                                    <input type="text" class="form-control" name="seat_belt" />
                                </div> 
                                <div class="form-group">
                                    <label>AUDIO</label>
                                    <input type="text" class="form-control" name="audio" />
                                </div> 
                                <div class="form-group">
                                    <label>KARPET MOBIL</label>
                                    <input type="text" class="form-control" name="karpet_mobil" />
                                </div> 
                                <div class="form-group">
                                    <label>BAN SEREP</label>
                                    <input type="text" class="form-control" name="ban_serep" />
                                </div> 
                                <div class="form-group">
                                    <label>STNK</label>
                                    <input type="text" class="form-control" name="stnk" />
                                </div> 
                                <div class="form-group">
                                    <label>FOTO KONDISI MOBIL</label>
                                    <input type="file" class="form-control" name="foto_kondisi_mobil" />
                                </div> 
                                <div class="col-md-4 mt-3">
                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                                    <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
-
            </div>
        </div>
    </div>
@endsection