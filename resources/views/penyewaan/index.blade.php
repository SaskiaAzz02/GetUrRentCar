@extends('layout.layout')

@section('title', 'Data Penyewaan')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>DATA PENYEWAAN</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="penyewaan/tambah" class="btn btn-success">LAKUKAN PENYEWAAN</a>
                            <a href="mobil/unduh">
                                <btn class="btn btn-primary">CETAK PDF</btn>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="penyewaan/unduh" class="btn btn-primary">CETAK PDF</a>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-hover table-bordered DataTable">
                        <thead>
                            <tr>
                                <th>ID PENYEWAAN</th>
                                <th>MOBIL</th>
                                <th>TANGGAL PEMINJAMAN</th>
                                <th>JUMLAH MEMINJAM</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($info as $p)
                                <tr>
                                    <td>{{ $p->id_penyewaan }}</td>
                                    <td>{{ $p->merk . ' ' . $p->plat_mobil }}</td>

                                    {{-- <td>{{ $p->merk }}</td> --}}
                                    <td>{{ $p->tanggal_peminjaman }}</td>
                                    <td>{{ $p->jumlah_sewa }}</td>
                                    <td>
                                        <a href="penyewaan/detail/{{ $p->id_penyewaan }}" >
                                            <button class="btn btn-warning">DETAIL</button>
                                        </a>
                                        <a href="penyewaan/edit/{{ $p->id_penyewaan }}" class="btn btn-primary">EDIT</a>
                                        <button class="btn btn-danger btnHapus"
                                            idPenyewa="{{ $p->id_penyewaan }}">HAPUS</button>
                                    </td>
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
            let idPenyewa = $(this).attr('idPenyewa');
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
                        url: 'penyewaan/hapus',
                        data: {
                            id_penyewaan: idPenyewa,
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