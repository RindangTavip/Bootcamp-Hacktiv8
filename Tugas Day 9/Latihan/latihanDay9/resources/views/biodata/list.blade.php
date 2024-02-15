@extends('layouts.master')

@section('content')
<table>
<h1>Biodata List</h1>
   <section class="container">
       <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>NIK</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($biodata as $item)
                <tr>
                    <td> {{$item->nama_lengkap}} </td>
                    <td> {{$item->nik}} </td>
                    <td> {{$item->umur}} </td>
                    <td> {{$item->alamat}} </td>
                    <td>
                        <a href="{{ route('biodata.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('biodata.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method ('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
           </tbody>
       </table>
    </section>

<a href="{{route('biodata.create') }}">Add New Biodata</a>
@endsection