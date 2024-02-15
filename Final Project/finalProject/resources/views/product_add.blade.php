@extends('adminlte::page')

@section('css')
<style>
    .imgUpload {
                max-width: 300px;
                max-height: 300px;
                min-width: 300px;
                min-height: 300px;
    }

    .select2-container{
        width: 1120.74px;
        border: 1px solid #ccc!important;
        padding: 5px;
    }
</style>

@section('title', 'New Product')
@section('content_header')
    <h1>Create a New Product</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row mb-3">
                                <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="product_name" id="product_name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="product_desc" class="col-sm-2 col-form-label">Product Desc</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="product_desc" id="product_desc">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="category_name" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <x-adminlte-select2 name="category_name" id="category">
                                        <option value="" disabled selected>Please Choose Category ...</option>
                                        @foreach ($category as $c)
                                            <option value="{{ $c->category_name}}">{{ $c->category_name }}</option>
                                        @endforeach
                                    </x-adminlte-select2>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <x-adminlte-select2 name="status" id="status">
                                        <option value="" disabled selected>Please Choose Status ...</option>
                                        <option value="Draft">Draft</option>
                                        <option value="Publish">Publish</option>
                                    </x-adminlte-select2>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-sm-2 col-form-label">Price (Rp)</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="price" id="price">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="weight" class="col-sm-2 col-form-label">Weight (gr)</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="weight" id="weight">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <img src="{{asset('image/default.png')}}" id="imagePreview" class="imgUpload" alt="">
                                    <input type="file" class="form-control" name="image" id="image">
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

@section('js')
<script>
   $.ajax({
    url:'{{ route('product.getProductById') }}',
    method:'get',
    type:'application/json',
    success:function(response){
        var key =  response.key
        $('#product_id').val(key)
        console.log(response)
    }
   })

   $('#category').change(function (){
    var category  = $(this).val();
        $.ajax({
            url:`{{ route('category.getCategoryById') }}`,
            method:'get',
            data:{id:$('#category').val()},
        
            success:function(response){
               var category_name =  response.category.category_name;
               $('#category').val(category_name);
            }
        })
    });

    $('#image').change(function (){
        const file = this.files[0]
        console.log(file)
        if(file){
            let reader = new FileReader()
            reader.onload = function (event){ 
                $('#imagePreview').attr('src',event.target.result)
            }
            reader.readAsDataURL(file);
        }
    })
</script>
@stop