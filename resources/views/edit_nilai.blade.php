@extends('template')
@section('title','Input Nilai')
<style type="text/css">
	.hide {
			display: none;
		}

		label {
			margin-bottom: 15px;
		}

		input[type="text"], input[type="number"]{
			width: 80%;
		}
		select {
			width: 82%;
		}

		input[type="submit"] {
			padding: 10px;
			text-align: center;
			padding-bottom: 10px;
			font-weight: 850;
		}

		.box {
			height: auto!important;
		}
</style>
@section('main')
<div class="center-item">
	<div class="box" id="box">
		<div class="g-form">
			<a href="{{route('value')}}" class="btn-kembali">Back</a>
		</div>
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
		<h3>Data Nilai Mahasiswa</h3>
		<form action="{{route('update_value', ['id'=>$siswa->id_mahasiswa])}}" class="form_nilai" method="post">
		{{csrf_field()}}
		<label for="npm" class="control-label">Npm &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="text" required class="input_npm" placeholder="npm" name="npm" value="{{$siswa->npm}}"></label>
		<label for="nama" class="control-label">Nama &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="text" required class="input_npm" placeholder="nama mahasiswa" name="nama" value="{{$siswa->nama}}"></label>
		<label for="nama" class="control-label">Mata Kuliah &nbsp; &nbsp; &nbsp;
			<select name="matkul" id="matkul">
				@foreach($matkuls as $mk)
					<option value="{{$mk->id_matkul}}" @if($siswa->id_matkul == $mk->id_matkul) selected @endif>{{ucwords($mk->nama_matkul)}}</option>
				@endforeach
			</select>
		</label>
		<label for="uts" class="control-label">Nilai Uts &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="number" name="nuts" required class="input_uts" placeholder="nilai uts" value="{{$siswa->nilai_uts}}"></label>
		<label for="uas" class="control-label">Nilai Uas &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="number" name="nuas" required class="input_uas" placeholder="nilai uas" value="{{$siswa->nilai_uas}}"></label>
		<div>
			<label for="nama" class="control-label"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<input type="submit" value="Update" class="submit_nilai">
			</label>
		</div>
		</form>
	</div>
</div>
@endsection