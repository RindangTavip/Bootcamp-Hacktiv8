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

@section('title', 'New Order')
@section('content_header')
    <h1>Create a New Order</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row mb-3">
                                <label for="order_id" class="col-sm-2 col-form-label">Order Id</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="order_id" id="order_id" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="order_date" class="col-sm-2 col-form-label">Order Date</label>
                                <div class="col-sm-10">
                                    @php
                                    $config = ['format' => 'YYYY-MM-DD'];
                                    $date = date('Y-m-d');
                                    @endphp
                                    <x-adminlte-input-date name="order_date" value="{{ $date }}" :config="$config"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="customer" class="col-sm-2 col-form-label">Customer</label>
                                <div class="col-sm-10">
                                    <x-adminlte-select2 name="customer_id" id="customer">
                                        <option value="" disabled selected>Please Choose Customer ...</option>
                                        @foreach ($customer as $c)
                                            <option value="{{ $c->customer_id}}">{{ $c->customer_fullname }}</option>
                                        @endforeach
                                    </x-adminlte-select2> 
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="product" class="col-sm-2 col-form-label">Product</label>
                                <div class="col-sm-10">
                                    <x-adminlte-select2 name="product_id" id="product">
                                        <option value="" disabled selected>Please Choose Product ...</option>
                                        @foreach ($product as $p)
                                            <option value="{{ $p->product_id}}">{{ $p->product_name }}</option>
                                        @endforeach
                                    </x-adminlte-select2>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="order_status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <x-adminlte-select2 name="order_status" id="order_status">
                                        <option value="" disabled selected>Please Choose Status ...</option>
                                        <option value="Pending">Pending</option>
                                        <option value="On Progress">On Progress</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Delivered">Delivered</option>
                                        <option value="Done">Done</option>
                                        <option value="Cancel">Cancel</option>
                                    </x-adminlte-select2>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="price" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="order_quantity" class="col-sm-2 col-form-label">Quantity </label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="order_quantity" id="quantity">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="order_total" class="col-sm-2 col-form-label">Total </label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="order_total" id="total" readonly>
                                </div>
                            </div>
                        
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i>
                                     Save</button>

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
    url:`{{ route('order.getOrderId') }}`,
    method:'get',
    type:'application/json',
    success:function(response){
        var key =  response.key
        $('#order_id').val(key)
        console.log(response)
    }
   })

   $('#customer').change(function (){
    var customer  = $(this).val();
        $.ajax({
            url:`{{ route('customer.getCustomerById') }}`,
            method:'get',
            data:{id:$('#customer').val()},
        
            success:function(response){
               var email =  response.customer.email;
               $('#email').val(email);
            }
        })
    });

   $('#product').change(function (){
    var product  = $(this).val();
        $.ajax({
            url:`{{ route('product.getProductById') }}`,
            method:'get',
            data:{id:$('#product').val()},
        
            success:function(response){
                var price =  response.product.price
                $('#price').val(price); 
            }
        })
    });

    $('#quantity').keyup(function (){
        var quantity = $(this).val()
        var  price = $('#price').val()
        var total = 0
        total = quantity * price;
        $('#total').val(total)
    })
</script>
@stop