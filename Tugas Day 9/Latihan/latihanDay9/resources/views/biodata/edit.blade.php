@extends('layouts.master')

@section('content')
    <h1>Edit Biodata</h1>

    <form action="{{ route('biodata.update', $biodata->id) }}" method="POST">
        @csrf
        @method ('PUT')
        <label for="nama_lengkap">Nama Lengkap :</label>
        <input type="text" name="nama_lengkap" value="{{$biodata->nama_lengkap}}" required><br>

        <label for="nik">NIK :</label>
        <input type="text" name="nik" value="{{$biodata->nik}}" required><br>

        <label for="umur">Umur :</label>
        <input type="number" name="umur" value="{{$biodata->umur}}" required><br>

        <label for="alamat">Alamat :</label>
        <textarea name="alamat" cols="30" rows="2" required>{{$biodata->alamat}}</textarea><br>

        <button type="submit">Submit</button>
    </form>
@endsection