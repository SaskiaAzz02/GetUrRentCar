<!DOCTYPE html>
<html>
<head>
    <title>DATA MOBIL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
        <div class="container">
            <table class="table table-bordered table-striped mt-2 DataTable">
                <thead>
				<tr>
                    <th>JENIS MOBIL</th>
                    <th>MERK</th>
                    <th>PLAT MOBIL</th>
                    <th>NOMOR RANGKA</th>
                    <th>FOTO MOBIL</th>
                    <th>HARGA SEWA PER HARI</th>
				</tr>
			<tbody>
				@php $i=1 @endphp
				@foreach($mobil as $m)
				<tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td>{{ $m->jenis_mobil }}</td> --}}
                    <td>{{ $m->merk }}</td>
                    <td>{{ $m->plat_mobil }}</td>
                    <td>{{ $m->nomor_rangka }}</td>
                    <td>
                        @if (!empty($imageDataArray[$loop->index]))
                            <img src="{{ $imageDataArray[$loop->index]['src'] }}"
                                alt="{{ $imageDataArray[$loop->index]['alt'] }}"
                                style="max-width: 100px; height: auto;" />
                        @endif
                    </td>
                    <td>{{ $m->harga_sewa_per_hari }}</td>
                    

				</tr>
				@endforeach
			</tbody>
			</thead>
		</table>
 
	</div>
 
</body>
</html>