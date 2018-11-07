@extends('template')
@section('title','Aplikasi Nilai Mahasiswa')
<style>
.center-item {
	margin-top: 50px;	
}
</style>
@section('main')
<div class="center-item">
	<div class="box" id="box">
		<h2>APLIKASI NILAI MAHASISWA - CREATED BY GROUP ONE</h2>
			<div class="btn-icon">
				<a href="{{route('matkul')}}" class="input-matkul">
					<p>Input Mata Kuliah</p>
				</a>
				<a href="{{route('value')}}" class="input-nilai">
					<p>Input Nilai Mahasiswa</p>
				</a>
			</div>
			<footer class="footer">Copyrights &copy; 2018</footer>
	</div>
<div class="center-item">
@endsection