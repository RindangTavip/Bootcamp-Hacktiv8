@extends('layouts.master')

@section('content')
    <div class="container" id="listing">
        <div class="row" style="margin-bottom:10px">
            <div class="col-md-3">
                <h3>Manajemen Kontak</h3>
            </div>
            <div class="col-md-9">
                <a type="button" href="/posts/input" class="btn btn-primary">Tambah Kontak</a> &nbsp;
            </div>
        </div>
		<table class="table table-striped">
			<thead>
				<tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Telpon</th>
                    <th>Opsi</th>
				</tr>
			</thead>
			<tbody>
                @foreach ($posts as $post)
				<tr>
                    <td></td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->email }}</td>
                    <td>{{ $post->phone }}</td>
                    <td>
                        <a type="button" href="/data/edit" class="btn btn-warning">Edit</a>
                        <a type="button" href="" class="btn btn-danger">Hapus</a>			
                    </td>
				</tr>
                @endforeach
			</tbody>
		</table>
	</div>
@endsection