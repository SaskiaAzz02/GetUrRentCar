@extends('layout.layout')
@section('title', 'Data Pengembalian')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>DATA PENGEMBALIAN</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="pengembalian/tambah" class="btn btn-success">PENGEMBALIAN SEWA</a>
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
                            @foreach ($info as $p)
                                <tr>
                                    <td>{{ $p->merk . ' ' . $p->nomor_rangka }}</td>
                                    <td>{{ $p->tanggal_pengembalian }}</td>
                                    <td>
                                        <a href="pengembalian/edit/{{ $p->id_pengembalian }}" class="btn btn-primary">EDIT</a>
                                        <button class="btn btn-danger btnHapus"
                                            idPengembalian="{{ $p->id_pengembalian }}">HAPUS</button>
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
    </script>
@endsection