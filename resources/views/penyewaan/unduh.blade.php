<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
 
	<div class="container">
		<br/>
		<a href="penyewaan/unduh" class="btn btn-primary" target="_blank">CETAK PDF</a>
		<table class='table table-bordered'>
			<thead>
				<tr>
                    <th>ID PEYEWAAN</th>
                    <th>MOBIL</th>
                    <th>TANGGAL PEMINJAMAN</th>
                    <th>JUMLAH PEMINJAMAN</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($penyewaan as $p)
				<tr>
                    <td>{{ $p->id_penyewaan }}</td>
                    <td>{{ $p->merk }}</td>
                    <td>{{ $p->tanggal_peminjaman }}</td>
                    <td>{{ $p->jumlah_sewa }}</td>

				</tr>
				@endforeach
			</tbody>
		</table>
 
	</div>
 
</body>
</html>