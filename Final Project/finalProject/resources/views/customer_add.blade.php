@extends('adminlte::page')

@section('title', 'New Customer')
@section('content_header')
    <h1>Create a New Customer</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('customer.store') }}" method="POST">
                            @csrf
                            
                            <div class="row mb-3">
                                <label for="customer_fullname" class="col-sm-2 col-form-label">FullName</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="customer_fullname" id="customer_fullname">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="customer_email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="customer_email" id="customer_email">
                                </div>
                            </div>
                           
                            <fieldset class="row mb-3">
                                <label class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="customer_gender" id="customer_gender"
                                            value="male" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="customer_gender" id="customer_gender"
                                            value="female">
                                        <label class="form-check-label" for="gridRadios2">
                                            Female
                                        </label>
                                    </div>
                                    
                                </div>
                            </fieldset>
                           
                            <div class="row mb-3">
                                <label for="customer_phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="customer_phone" id="customer_phone">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="customer_address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea  class="form-control" name="customer_address" id="customer_address"></textarea>
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