@extends('layouts.master')

@section('content')
    <div class="container" id="new-entry">
		<h3>Tambah Kontak</h3>
        <br>
		<form action="" method="post">
			<div class="form-group">
				<label class="inline-80">Nama</label>
				<input type="text" name="nama" required/>
			</div>
            <br>
			<div class="form-group">
				<label class="inline-80">Email</label>
				<input type="email" name="email" required/>
			</div>
            <br>
			<div class="form-group">
				<label class="inline-80">Telp</label>
				<input type="text" name="telp" required/>
			</div>
            <br>
			<div class="form-group">
				<input type="submit" value="Simpan" class="btn btn-primary" />
				<a href="/posts" class="btn btn-danger">Kembali</a>
			</div>
		</form>
	</div>
@endsection