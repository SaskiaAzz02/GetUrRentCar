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
		<table class='table table-bordered'>
			<thead>
				<tr>
                    <th>JENIS MOBIL</th>
                    <th>MERK</th>
                    <th>PLAT MOBIL</th>
                    <th>NOMOR RANGKA</th>
                    <th>FOTO MOBIL</th>
                    <th>HARGA SEWA PER HARI</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($mobil as $m)
				<tr>
                    <td>{{ $m->jenis_mobil }}</td>
                    <td>{{ $m->merk }}</td>
                    <td>{{ $m->plat_mobil }}</td>
                    <td>{{ $m->nomor_rangka }}</td>
                    <td>
                        @if ($m->foto_mobil)
                            <img src="{{ url('foto') . '/' . $m->foto_mobil }} "
                                style="max-width: 250px; height: auto;" />
                        @endif
                    </td>
                    <td>{{ $m->harga_sewa_per_hari }}</td>

				</tr>
				@endforeach
			</tbody>
		</table>
 
	</div>
 
</body>
</html>