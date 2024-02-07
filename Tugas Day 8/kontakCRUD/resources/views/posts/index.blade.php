@extends('layouts.master')

@section('content')
    <div class="container" id="listing">
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-3">
                <h3>Manajemen Kontak</h3>
            </div>
            <div class="col-md-9">
                <a type="button" href="{{ route('posts.create') }}" class="btn btn-primary">Tambah Kontak</a> &nbsp;
            </div>
        </div>
		<table class="table table-striped">
			<thead>
				<tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Telpon</th>
                    <th>Opsi</th>
				</tr>
			</thead>
			<tbody>
                @foreach ($posts as $post)
				<tr>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->email }}</td>
                    <td>{{ $post->phone }}</td>
                    <td>
                    <div class="row">
                        <div class="col-md-3">
                            <a type="button" href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                        </div>
                        <div class="col-md">
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    <div class="row">	
                    </td>
				</tr>
                @endforeach
			</tbody>
		</table>
	</div>
@endsection