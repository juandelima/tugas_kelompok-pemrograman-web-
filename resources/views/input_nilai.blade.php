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
		<div class="g-form" style="margin-bottom: 10px;">
			<a href="{{url('/')}}" class="btn-kembali">Back</a>
			<a href="#" class="btn-show-form" id="show_hide">Show/Hide Form</a>
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
		<form action="{{route('save_value')}}" id="show-form" class="form_nilai" style="display: none;" method="post">
		{{csrf_field()}}
		<label for="npm" class="control-label">Npm &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="text" required class="input_npm" placeholder="npm" name="npm"></label>
		<label for="nama" class="control-label">Nama &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="text" required class="input_npm" placeholder="nama mahasiswa" name="nama"></label>
		<label for="nama" class="control-label">Mata Kuliah &nbsp; &nbsp; &nbsp;
			<select name="matkul" id="matkul">
				@foreach($matkuls as $mk)
					<option value="{{$mk->id_matkul}}">{{ucwords($mk->nama_matkul)}}</option>
				@endforeach
			</select>
		</label>
		<label for="uts" class="control-label">Nilai Uts &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="number" name="nuts" required class="input_uts" placeholder="nilai uts"></label>
		<label for="uas" class="control-label">Nilai Uas &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<input type="number" name="nuas" required class="input_uas" placeholder="nilai uas"></label>
		<div>
			<label for="nama" class="control-label"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<input type="submit" value="Simpan" class="submit_nilai">
			</label>
		</div>
		</form>
		<table id="nilai_siswa">
			<thead>
				<tr>
					<th rowspan="2">No</th>
					<th rowspan="2">Npm</th>
					<th rowspan="2">Nama Mahasiswa</th>
					<th rowspan="2">Mata kuliah</th>
					<th colspan="2">Nilai</th>
					<th rowspan="2">Grade</th>
					<th rowspan="2">Aksi</th>
				</tr>
				<tr>
					<th>Uts</th>
					<th>Uas</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				@foreach($nsiswa as $siswa)
				<tr>
					<td><center>{{$no++}}</center></td>
					<td>{{$siswa->npm}}</td>
					<td>{{$siswa->nama}}</td>
					<td>{{$siswa->mata_kuliah->nama_matkul}}</td>
					<td><center>{{$siswa->nilai_uts}}</center></td>
					<td><center>{{$siswa->nilai_uas}}</center></td>
					<td class="grade"><center>
						<?php
							if ($siswa->grade == 'A') {
								echo '<p style="color: #769fcd;">'.$siswa->grade.'</p>';
							} elseif($siswa->grade == 'B') {
								echo '<p style="color: #1fab89;">'.$siswa->grade.'</p>';
							} elseif($siswa->grade == 'C') {
								echo '<p style="color: #ff9a00;">'.$siswa->grade.'</p>';
							} elseif($siswa->grade == 'D') {
								echo '<p style="color: #e84545;">'.$siswa->grade.'</p>';
							} elseif ($siswa->grade == 'E') {
								echo '<p style="color: #d72323;">'.$siswa->grade.'</p>';
							} else {
								echo '<p style="color: #222831;">'.$siswa->grade.'</p>';
							}
						?>
					</center></td>
					<td width="150px">
						<div align="center">
							<form action="{{route('delete_value', ['id'=>$siswa->id_mahasiswa])}}" method="post" class="aksi">
								{{csrf_field()}}
									<a href="{{route('edit_value', ['id'=>$siswa->id_mahasiswa])}}" class="update">Update</a>
									<button class="delete" type="submit">Delete</button>
							</form>
						</div>
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