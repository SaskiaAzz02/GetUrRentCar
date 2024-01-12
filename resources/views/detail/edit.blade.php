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
                      {{-- {{dd($detailSewa)}} --}}
                        <input type="hidden" class="form-control" name="id_detail" value="{{$info->id_detail}}" />
                        <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                                <label>JENIS MOBIL</label>
                                <select name="id_jenis_mobil" id="" class="form-control">
                                    @foreach ($jenis_mobil as $j)
                                        <option value="{{ $j->id_jenis_mobil }}" {{ $info->nama_jenis == $j->nama_jenis ? 'selected' : '' }}>
                                            {{ $j->nama_jenis }}
                                        </option>
                                    @endforeach
                                </select>
                            </div><br>
                            
                            <div class="form-group">
                                <label>MERK MOBIL</label>
                                <select name="merk" id="" class="form-control">
                                    @foreach ($mobil as $s)
                                        <option value="{{ $s->merk }}" {{ $info->merk == $s->merk ? 'selected' : '' }}>
                                            {{ $s->merk }}
                                        </option>
                                    @endforeach
                                </select>
                            </div><br>
                            
                            <div class="form-group">
                                <label>PLAT MOBIL</label>
                                <select name="plat" id="" class="form-control">
                                    @foreach ($mobil as $s)
                                        <option value="{{ $s->plat_mobil }}" {{ $info->plat == $s->plat_mobil ? 'selected' : '' }}>
                                            {{ $s->plat_mobil }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>LAMPU</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lampu" id="lampu">
                                    <label class="form-check-label" for="lampu">
                                      Baik
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lampu" id="lampu" checked>
                                    <label class="form-check-label" for="lampu">
                                      Tidak Baik
                                    </label>
                                  </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>DONGKRAK KIT</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dongkrak_kit" id="dongkrak_kit">
                                    <label class="form-check-label" for="dongkrak_kit">
                                      Baik
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dongkrak_kit" id="dongkrak_kit" checked>
                                    <label class="form-check-label" for="dongkrak_kit">
                                      Tidak Baik
                                    </label>
                                  </div>
                            </div> 
                            <br>
                            <div class="form-group">
                                <label>KLAKSON</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="klakson" id="klakson">
                                    <label class="form-check-label" for="klakson">
                                      Baik
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="klakson" id="klakson" checked>
                                    <label class="form-check-label" for="klakson">
                                      Tidak Baik
                                    </label>
                                  </div>
                            </div> <br>
                            <div class="form-group">
                                <label>HEAD REST</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="head_rest" id="head_rest">
                                    <label class="form-check-label" for="head_rest">
                                      Baik
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="head_rest" id="head_rest" checked>
                                    <label class="form-check-label" for="head_rest">
                                      Tidak Baik
                                    </label>
                                  </div>
                                  <br>
                            </div> 
                            <div class="form-group">
                                <label>KEBERSIHAN MOBIL</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kebersihan_mobil" id="kebersihan_mobil">
                                    <label class="form-check-label" for="kebersihan_mobil">
                                      Baik
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kebersihan_mobil" id="kebersihan_mobil" checked>
                                    <label class="form-check-label" for="kebersihan_mobil">
                                      Tidak Baik
                                    </label>
                                  </div>
                            </div> <br>
                            <div class="form-group">
                                <label>SEAT BELT</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="seat_belt" id="seat_belt">
                                    <label class="form-check-label" for="seat_belt" checked>
                                      Baik
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="seat_belt" id="seat_belt">
                                    <label class="form-check-label" for="seat_belt" checked>
                                      Tidak Baik
                                    </label>
                                  </div>
                                  <div class="form-check">
                            </div> 
                            <div class="form-group">
                                <label>AUDIO</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="audio" id="audio">
                                    <label class="form-check-label" for="audio" checked>
                                      Baik
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="audio" id="audio">
                                    <label class="form-check-label" for="audio" checked>
                                      Tidak Baik
                                    </label>
                                  </div><br>
                            </div> 
                            <div class="form-group">
                                <label>KARPET MOBIL</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="karpet_mobil" id="karpet_mobil" checked>
                                    <label class="form-check-label" for="karpet_mobil">
                                      Baik
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="karpet_mobil" id="karpet_mobil">
                                    <label class="form-check-label" for="karpet_mobil">
                                      Tidak Baik
                                    </label>
                                  </div><br>
                            </div> 
                            <div class="form-group">
                                <label>BAN SEREP</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ban_serep" id="ban_serep" checked>
                                    <label class="form-check-label" for="ban_serep">
                                      Baik
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ban_serep" id="ban_serep">
                                    <label class="form-check-label" for="ban_serep">
                                      Tidak Baik
                                    </label>
                                  </div><br>
                            </div> 
                            <div class="form-group">
                                <label>STNK</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="stnk" id="stnk">
                                    <label class="form-check-label" for="stnk" checked>
                                      Baik
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="stnk" id="stnk">
                                    <label class="form-check-label" for="stnk">
                                      Tidak Baik
                                    </label>
                                  </div><br>
                            </div> 
                            <div class="form-group">
                                <label>FOTO KONDISI MOBIL</label>
                                <input type="file" class="form-control" name="foto_kondisi_mobil" />
                                @csrf
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