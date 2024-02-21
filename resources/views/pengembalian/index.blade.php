@extends('layout.layout')
@section('title', 'Data Pengembalian')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>DATA PENGEMBALIAN</h1>
                    <span class="h5">
                        Jumlah Pengembalian Yang Terdaftar : {{$jumlahPengembalian}}
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="pengembalian/tambah" class="btn btn-success">PENGEMBALIAN SEWA</a>
                        @if (!(Auth::user()->role=== 'customer'))
                            <a href="pengembalian/unduh">
                                <btn class="btn btn-primary">CETAK PDF</btn>
                            </a>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <table class="table table-hover table-bordered DataTable">
                        <thead>
                            <tr>
                                <th>MOBIL</th>
                                <th>TANGGAL PENGEMBALIAN</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengembalian as $p)
                                <tr>
                                    <td>{{ $p->id_mobil }} {{ $p->merk }} {{ $p->plat_mobil }}</td>
                                    <td>{{ $p->tanggal_pengembalian }}</td>
                                    <td>
                                        <a href="pengembalian/detail/{{ $p->id_pengembalian }}" ><button class="btn btn-warning">DETAIL</button></a>
                                    @if (!(Auth::user()->role=== 'customer'))
                                        <a href="pengembalian/edit/{{ $p->id_pengembalian }}" class="btn btn-primary">EDIT</a>
                                        <button class="btn btn-danger btnHapus"
                                            idPengembalian="{{ $p->id_pengembalian }}">HAPUS</button>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table table-hover table bordered">
                        <thead>
                            <tr>
                                <th>Log activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($log as $l)
                            <tr>
                                <td>{{ $l->log }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $('tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idPengembalian = $(this).attr('idPengembalian');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'green'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Ajax Delete
                    $.ajax({
                        type: 'DELETE',
                        url: 'pengembalian/hapus',
                        data: {
                            id_pengembalian: idPengembalian,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data.success) {
                                swal.fire('Berhasil di hapus!', '', 'success').then(function() {
                                    // Refresh Halaman
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            $('.DataTable').DataTable();
        });
    </script>
@endsection