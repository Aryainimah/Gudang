@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
	<center><h1> Data Gudang </h1></center>
	<a href="getImport" class="btn btn-success">Import</a>
	<div class="btn-group">
		<button type="button" class="btn btn-info">Export</button>
		<button type="button" class="btn-info dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only">Toggle Dropdown</span>
		</button>
		<ul class="dropdown-menu" role="menu" id="export-menu">
			<li id="export-to-excel"><a href="getExport">Export To Excel</a></li>
			<li id="export-to-pdf"><a href="pdf">Export To Pdf</a></li>
			<li class="divider"></li>
			<li><a href="#">Other</a></li>
		</ul>
	</div>
	<a href="deleteAll" class="btn btn-danger">Delete All</a>
	<div class="panel panel-primary">
		<div class="panel-heading"> Data Gudang
		<div class="panel-title pull-right"><a href="gudangs/create"> Tambah </a> </div>
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
						<th colspan="3">Action</th>
					</tr>
				</thead>
				<tbody>
				@php $no=1; @endphp
				@foreach($gudang as $data)
				<tr>
				<td>{{$no++}}</td>
				<td>{{$data->nama_barang}}</td>
				<td>{{$data->merk}}</td>
				<td>{{$data->kuantitas}}</td>
				<td>Rp.{{ number_format ($data->harga, 2)}}</td>
				<td>Rp.{{ number_format ($data->total_harga, 2)}}</td>

				@role('admin')
				<td>
				<a class="btn btn-warning" href="/gudangs/{{$data->id}}/edit">Edit</a>|</td>
				@endrole
				<td>
				<a class="btn btn-info" href="/gudangs/{{$data->id}}">Show</a>|</td>
				@role('admin')
				<td><form action="{{route('gudangs.destroy',$data->id)}}" method="post">
				<input name="_method" type="hidden" value="DELETE">
				<input name="_token" type="hidden" >
				<input class="btn btn-danger" type="submit" value="Delete">
				{{csrf_field()}}
				</form>
				</td>
				@endrole
			</tr>
			@endforeach
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div> 

@endsection