<!DOCTYPE html>
<html>
<head>
    <title>DATA PEMBAYARAN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>

        <table class="table table-bordered table-striped mt-2 DataTable">
    @php $i=1 @endphp
    <thead>
				<tr>
                    <th>YANG DIKEMBALIKAN</th>
                    <th>TOTAL MOBIL</th>
                    <th>TANGGAL PEMBAYARAN</th>
                    <th>JENIS PEMBAYARAN</th>   
				</tr>
			<tbody>
    @foreach($pembayaran as $p)
                <tr>
                    <td>{{ $p->id_pengembalian }}{{ $p->merk }} {{ $p->plat_mobil }}</td>
                    <td>{{ $p->total}}</td>
                    <td>{{ $p->tanggal_pembayaran}}</td>
                    <td>{{ $p->jenis_pembayaran}}</td>
                </tr>
				@endforeach
			</tbody>
    </thead>
</table>
 
	</div>
 
</body>
</html>