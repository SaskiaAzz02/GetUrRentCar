<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
 
	<div class="container">
		<center>
			<h4>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
			<h5><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
		</center>
		<br/>
		<a href="mobil/unduh" class="btn btn-primary" target="_blank">CETAK PDF</a>
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
 
</body>
</html>