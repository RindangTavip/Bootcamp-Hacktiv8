@extends('layouts.master')

@section('content')
    <h1>Create Biodata</h1>
    <form action="{{ route('biodata.store') }}" method="POST">
        @csrf
        <label for="nama_lengkap">Nama Lengkap :</label>
        <input type="text" name="nama_lengkap" value="{{old('nama_lengkap')}}" required><br>

        <label for="nik">NIK :</label>
        <input type="text" name="nik" value="{{old('nik')}}" required><br>

        <label for="umur">Umur :</label>
        <input type="number" name="umur" value="{{old('umur')}}" required><br>

        <label for="alamat">Alamat :</label>
        <textarea name="alamat" cols="30" rows="2" required>{{old('alamat') }}</textarea><br>

        <button type="submit">Submit</button>
    </form>
@endsection