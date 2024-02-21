<!DOCTYPE html>
<html>
<head>
    <title>DATA PEMBAYARAN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <table class="table table-bordered table-striped mt-2 DataTable">
    @php $i=1 @endphp
    <thead>
			<tbody>
                @foreach($pengembalian as $p)
				<tr>
                    <th>MOBIL</th>
                    <th>TANGGAL PENGEMBALIAN</th>
				</tr>
                <tr>
                    <td>{{ $p->id_mobil }} {{ $p->merk }} {{ $p->plat_mobil }}</td>
                    <td>{{ $p->tanggal_pengembalian }}</td>
                </tr>
				@endforeach
			</tbody>
    </thead>
		</table>
 
	</div>
 
</body>
</html>