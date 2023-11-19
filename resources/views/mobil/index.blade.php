@extends('layout.layout')
@section('title', 'Data Mobil')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Mobil
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="mobil/tambah">
                                <btn class="btn btn-success">Tambah Jenis Mobil</btn>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>TANGGAL SURAT</th>
                                    <th>JENIS SURAT</th>
                                    <th>RINGKASAN</th>
                                    <th>FOTO SURAT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mobil as $mobil)
                                    <tr>
                                        <td>{{ $s->tanggal_surat }}</td>
                                        <td>{{ $s->jenis_surat }}</td>
                                        <td>{{ $s->ringkasan }}</td>
                                        <td>
                                            @if ($s->file)
                                                <img src="{{ url('foto') . '/' . $s->file }} "
                                                    style="max-width: 250px; height: auto;" />
                                            @endif
                                        </td>
                                        <td>
                                            <a href="mobil/edit/{{ $s->id_mobil }}">
                                                <btn class="btn btn-primary">EDIT</btn>
                                            </a>
                                            <btn class="btn btn-danger btnHapus" idMobil="{{ $s->id_mobil }}">HAPUS</btn>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="module">
        $('.DataTable tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idMobil = $(this).closest('.btnHapus').attr('idMobil');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'

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