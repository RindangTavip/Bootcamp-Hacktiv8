@extends('adminlte::page')

@section('title', 'New Category')
@section('content_header')
    <h1>Update Category</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('category.update',$category->category_id) }}" method="post">
                            @csrf
                            @method('PUT')
                            
                            <div class="row mb-3">
                                <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="category_name" id="category_name" value="{{ $category->category_name}}">
                                </div>
                            </div>
                        
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i>
                                     Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop