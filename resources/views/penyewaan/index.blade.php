@extends('layout.layout')
@section('title', 'Data Penyewaan')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        DATA PENYEWAAN
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="penyewaan/tambah">
                                <btn class="btn btn-success">LAKUKAN PENYEWAAN</btn>
                            </a>
                            <br><br>
                        </div>
                            <hr>
                            <div class=></div>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>JENIS MOBIL</th>
                                    <th>MERK</th>
                                    <th>PLAT MOBIL</th>
                                    <th>NOMOR RANGKA</th>
                                    <th>FOTO MOBIL</th>
                                    <th>HARGA SEWA PER HARI</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penyewaan as $p)
                                    <tr>
                                        <td>{{ $p->jenis_mobil }}</td>
                                        <td>{{ $p->merk }}</td>
                                        <td>{{ $p->plat_mobil }}</td>
                                        <td>{{ $p->nomor_rangka }}</td>
                                        <td>
                                            @if ($p->file)
                                                <img src="{{ url('foto') . '/' . $p->foto_mobil }} "
                                                    style="max-width: 250px; height: auto;" />
                                            @endif
                                        </td>
                                        <td>{{ $m->harga_sewa_per_hari }}</td>

                                        <td>
                                        <a href="penyewaan/edit/{{ $m->id_penyewaan }}">
                                                <btn class="btn btn-primary">EDIT</btn>
                                            </a>
                                            <a href="mobil/edit/{{ $m->id_mobil }}">
                                                <btn class="btn btn-primary">EDIT</btn>
                                            </a>
                                            <btn class="btn btn-danger btnHapus" idMobil="{{ $m->id_mobil }}">HAPUS</btn>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="card-footer">

                </div> -->
            </div>
        </div>
    </div>

    <script type="module">
        $('tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idMobil = $(this).closest('.btnHapus').attr('idMobil');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'green'

            }).then((result) => {
                if (result.isConfirmed) {
                    //Ajax Delete
                    $.ajax({
                        type: 'DELETE',
                        url: 'mobil/hapus',
                        data: {
                            id_mobil: idMobil,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data.success) {
                                swal.fire('Berhasil di hapus!', '', 'success').then(function() {
                                    //Refresh Halaman
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection