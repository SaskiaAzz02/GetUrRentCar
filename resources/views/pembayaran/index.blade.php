@extends('layout.layout')
@section('title', 'Data Pembayaran')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>PEMBAYARAN</h1> 
                 <span class="h5">
                    Jumlah Pembayaran Yang Terdaftar : {{$jumlahPembayaran}}
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="pembayaran/tambah" class="btn btn-success">BAYAR</a>
                    </div>
                </div>
                <hr>
                <table class="table table-hover table-bordered DataTable">
                    <thead>
                        <tr>
                            <th>YANG DIKEMBALIKAN</th>
                            <th>TOTAL MOBIL</th>
                            <th>TANGGAL PEMBAYARAN</th>
                            <th>JENIS PEMBAYARAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayaran as $p)
                            <tr>
                                <td>{{ $p->id_pembayaran }}</td>
                                <td>{{ $p->total}}</td>
                                <td>{{ $p->tanggal_pembayaran}}</td>
                                <td>{{ $p->jenis_pembayaran}}</td>
                                <td>
                                    <a href="pembayaran/detail/{{ $p->id_pembayaran }}" ><button class="btn btn-warning">DETAIL</button></a>
                                    @if (!(Auth::user()->role=== 'customer'))
                                    <a href="pembayaran/edit/{{ $p->id_pembayaran }}" class="btn btn-primary">EDIT</a>
                                    <button class="btn btn-danger btnHapus"
                                        idPembayaran="{{ $p->id_pembayaran }}">HAPUS</button>
                                        @endif
                                </td>
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
        let idPembayaran = $(this).attr('idPembayaran');
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
                    url: 'pembayaran/hapus',
                    data: {
                        id_pembayaran: idPembayaran,
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