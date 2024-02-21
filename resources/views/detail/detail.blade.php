@extends('layout.layout')
@section('title', 'Data Detail Sewa')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        DETAIL DATA DETAIL SEWA
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
                                        
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label>JENIS MOBIL</label>
                                                            <select name="id_jenis_mobil" id="" class="form-control">
                                                                <option value="" selected disabled>Pilih Jenis</option>
                                                                @foreach ($jenis_mobil as $j)
                                                                <option value="{{ $j->id_jenis_mobil }}">{{ $j->nama_jenis }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div><br>
                                                        <div class="form-group">
                                                            <label>MERK MOBIL</label>
                                                            <select name="merk" id="" class="form-control">
                                                                <option value="" selected disabled>Pilih Jenis</option>
                                                                @foreach ($merek as $s)
                                                                <option value="{{ $s->merk }}">{{ $s->merk }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div><br>
                                                        <div class="form-group">
                                                            <label>PLAT MOBIL</label>
                                                            <select name="plat" id="" class="form-control">
                                                                <option value="" selected disabled>Pilih Jenis</option>
                                                                @foreach ($plat as $s)
                                                                <option value="{{ $s->plat_mobil }}">{{ $s->plat_mobil }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div><br>
                                                        <div class="form-group">
                                                            <label>LAMPU</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="lampu" id="lampu">
                                                               
                                                              </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <label>DONGKRAK KIT</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="dongkrak_kit" id="dongkrak_kit">
                                                             
                                                              </div>
                                                        </div> 
                                                        <br>
                                                        <div class="form-group">
                                                            <label>KLAKSON</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="klakson" id="klakson">
                                                              
                                                              </div>
                                                        </div> <br>
                                                        <div class="form-group">
                                                            <label>HEAD REST</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="head_rest" id="head_rest">
                                                              
                                                              </div>
                                                              <br>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label>KEBERSIHAN MOBIL</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="kebersihan_mobil" id="kebersihan_mobil">
                                                               
                                                              </div>
                                                        </div> <br>
                                                        <div class="form-group">
                                                            <label>SEAT BELT</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="seat_belt" id="seat_belt">
                                                            
                                                              </div>
                                                              <div class="form-check">
                                                        </div> 
                                                        <div class="form-group">
                                                            <label>AUDIO</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="audio" id="audio">
                                                             
                                                              </div><br>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label>KARPET MOBIL</label>
                                                            <div class="form-check">
                                                               
                                                              </div><br>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label>BAN SEREP</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="ban_serep" id="ban_serep">
                                                               
                                                              </div><br>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label>STNK</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="stnk" id="stnk">
                                                               
                                                              </div><br>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label>FOTO KONDISI MOBIL</label>
                                                            <input type="file" class="form-control" name="foto_kondisi_mobil" />
                                                        </div> 
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
