@extends('template')
@section('title','Input Data Mata Kuliah')
<style type="text/css">
	#box {
		height: auto!important;
	}

	.center-item {
		margin-top: 75px;	
	}
</style>
@section('main')
<div class="center-item">
<div class="box" id="box">
	<a href="{{route('matkul')}}" class="btn-kembali">Back</a>
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
	<form action="{{route('update_mk', ['id'=>$matkuls->id_matkul])}}" id="input_mk" method="post">
		{{csrf_field()}}
		<h3>Update Data Mata Kuliah {{$matkuls->nama_matkul}}</h3>
		<label for="Kode Matkul" class="control-label">Kode Mata Kuliah
		<input type="text" name="kd_mk" value="{{$matkuls->kode_matkul}}" placeholder="kode mata kuliah..." style="margin-right: 18px;"></label>
		<label for="Nama Matakuliah" class="control-label">Mata Kuliah
		<input type="text" name="mk" placeholder="nama mata kuliah..." style="margin-right: 98px;" value="{{$matkuls->nama_matkul}}" required></label>
		<input type="submit" class="btn-simpan" value="Update">
	</form>
	<div style="display: flex; flex: 1;"></div>
	<footer class="footer">Copyrights &copy; 2018</footer>
</div>
</div>
@endsection