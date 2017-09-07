@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
	<center><h1> Data History </h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading"> Data History
		<div class="panel-title pull-right"><a href="/clear" > Clear all 
		</a></div>
		</div>
		<div class="panel-body">

			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Merk</th>
						<th>Kuantitas</th>
						<th>Harga</th>
						<th>Total Harga</th>
						<th>Keterangan</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
				@php $no=1; @endphp
				@foreach($history as $data)
				<tr>
				<td>{{$no++}}</td>
				<td>{{$data->nama_barang}}</td>
				<td>{{$data->merk }}</td>
				<td>{{$data->kuantitas }}</td>
				<td>Rp.{{ number_format ($data->harga, 2)}}</td>
				<td>Rp.{{ number_format ($data->total_harga, 2)}}</td>
				<td>{{$data->action}}</td>
				<td>{{$data->created_at}}</td>
			
			@endforeach
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div> 

@endsection