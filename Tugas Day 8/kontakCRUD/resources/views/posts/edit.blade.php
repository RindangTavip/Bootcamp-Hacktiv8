@extends('layouts.master')

@section('content')
    <div class="container" id="new-entry">
		<h3>Edit Kontak</h3>
        <br>
		<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
			<div class="form-group">
				<label class="inline-80">Nama</label>
				<input type="text" name="name" value="{{ old('name', $post->name) }}" required/>
			</div>
            <br>
			<div class="form-group">
				<label class="inline-80">Email</label>
				<input type="email" name="email" value="{{ old('email', $post->email) }}" required/>
			</div>
            <br>
			<div class="form-group">
				<label class="inline-80">Telp</label>
				<input type="text" name="phone" value="{{ old('phone', $post->phone) }}" required/>
			</div>
            <br>
			<div class="form-group">
				<input type="submit" value="Simpan" class="btn btn-primary" />
				<a href="/home" class="btn btn-danger">Kembali</a>
			</div>
		</form>
	</div>
@endsection