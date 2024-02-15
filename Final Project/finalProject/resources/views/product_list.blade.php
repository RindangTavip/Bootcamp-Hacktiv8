@extends('adminlte::page')

@section('title','Product List')

@section('content_header')
    <h1>Product List</h1>
@stop

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
                               <strong>{{  session('success') }}</strong>
                                
                              </div>
                            @endif

                            @if(session('error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{  session('error')}} </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                            @endif

                            <div class="float-right">
                                <a href="{{ route('product.create')}}" class="btn btn-success">
                                    <i class="fas fa-plus"></i>
                                    Create</a>

                            </div>
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Image</th>
                                    <th scope="col" width="175px">Name</th>
                                    <th scope="col">Desc</th>
                                    <th scope="col" width="120px">Price</th>
                                    <th scope="col" width="110px">Created At</th>
                                    <th scope="col">Status</th>    
                                    <th scope="col" width="200px" class="text-center">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                
                                    @foreach ($product->reverse() as $p)
                                    <tr>
                                        <th >{{ ++$i }}</th>
                                        <td><img src="{{ asset('images/'.$p->image)}}" alt="" width="100px"></td>
                                        <td>
                                            <dt>{{ $p->product_name }}</dt>
                                            <br>
                                            <dd>Category <span class="badge badge-info">{{ $p->category_name }}</span></dd>
                                            <dd>Weight <span class="badge badge-info">{{ $p->weight }} gr</span></dd>
                                        </td>
                                        <td>{{ $p->product_desc }}</td>
                                        <td>
                                            @currency($p->price)
                                        </td>
                                        <td>{{ $p->created_at }}</td>
                                        <td><span class="badge badge-secondary">{{ $p->status }}</span></td>
                                       
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                <a href="{{ route('product.edit',$p->product_id)}}" class="btn btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                    Edit</a>
                                                <form action="{{ route('product.destroy',$p->product_id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>

                                        </td>
                                      </tr>
                                    @endforeach
                               
                                 
                                </tbody>
                              </table>

                              {{ $product->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop

@section('js')
   <script>
            
        $("#success-alert").fadeTo(2000, 500).fadeOut(500, function(){
        $("#success-alert").fadeOut(500);
        });
   </script>
@stop