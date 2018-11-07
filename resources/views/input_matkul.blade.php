@extends('template')
@section('title','Input Data Mata Kuliah')
<style type="text/css">
	#box {
		height: auto!important;
	}

	.center-item {
		/*margin-top: 25px;*/
		margin-bottom: 15px;	
	}
</style>
@section('main')
<div class="center-item">
	<div class="box" id="box">
		<a href="{{url('/')}}" class="btn-kembali">Back</a>
		@if(session('notif'))
			<div class="message" id="message">
				<p>{{session('notif')}} <span class="close" id="close">X</span></p>
			</div>
		@endif

		@if(session('danger'))
			<div class="danger" id="message">
				<p>{{session('danger')}} <span class="close" id="close">X</span></p>
			</div>
		@endif
		<form action="{{route('insert_mk')}}" id="input_mk" method="post">
			{{csrf_field()}}
			<h3>Input Data Mata Kuliah</h3>
			<label for="Kode Matkul" class="control-label">Kode Mata Kuliah
			<input type="text" name="kd_mk" placeholder="kode mata kuliah..." style="margin-right: 18px;" required></label>
			<label for="Nama Matakuliah" class="control-label">Mata Kuliah
			<input type="text" name="mk" placeholder="nama mata kuliah..." style="margin-right: 98px;" required></label>
			<input type="submit" class="btn-simpan" value="Simpan">
		</form>
		<table>
			<thead>
				<th width="2%">No</th>
				<th width="5px">Kode</th>
				<th>Mata Kuliah</th>
				<th>Aksi</th>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				@foreach($matkuls as $mk)
				<tr>
					<td><center>{{$no++}}</center></td>
					<td>{{$mk->kode_matkul}}</td>
					<td>{{$mk->nama_matkul}}</td>
					<td width="170px">
						<form action="{{route('delete_mk', ['id'=>$mk->id_matkul])}}" method="post" class="aksi">
							{{csrf_field()}}
							<div align="center">
								<a href="{{route('edit_mk', ['id'=>$mk->id_matkul])}}" class="update">Update</a>
								<button class="delete" type="submit">Delete</button>
							</div>
						</form>
					</td>			
				</tr>
				@endforeach
			</tbody>
		</table>
		<div style="display: flex; flex: 1;"></div>
		<footer class="footer">Copyrights &copy; 2018</footer>
	</div>
</div>
@endsection