@extends('layouts.master')

@section('content')
    <div class="container" id="new-entry">
		<h3>Tambah Kontak</h3>
        <br>
		<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label class="inline-80">Nama</label>
				<input type="text" name="name" required/>
			</div>
            <br>
			<div class="form-group">
				<label class="inline-80">Email</label>
				<input type="email" name="email" required/>
			</div>
            <br>
			<div class="form-group">
				<label class="inline-80">Telp</label>
				<input type="text" name="phone" required/>
			</div>
            <br>
			<div class="form-group">
				<input type="submit" value="Simpan" class="btn btn-primary" />
				<a href="/posts" class="btn btn-danger">Kembali</a>
			</div>
		</form>
	</div>
@endsection