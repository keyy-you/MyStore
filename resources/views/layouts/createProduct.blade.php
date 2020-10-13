@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 bg-white">
        
    </div> 

    <div class="col-12 bg-white">
        <div class="card">
            <div class="card-header bg-primary">
            <div class="row">
                        <div class="col text-lg-left">Create Product</div>
                        <div class="col text-right">
                        <a href="/product" class="btn btn-xs btn-dark">
                            <i class="fa fa-backspace"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="/product/simpan" method="POST">
                    @csrf
                   
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Title</label>
                        <input type="text" class="form-control" value="" name="product_title">
                      </div>
                      @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @endif
                      <div class="form-group">
                          <label for="exampleInputPassword1">Product Price</label>
                          <input type="text" class="form-control" value="" name="product_price">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Product Image</label>
                          <input type="text" class="form-control" value="" name="product_image">
                      </div>
                      <input class="btn btn-primary float-right" type="submit" value="Tambah data">

                    
                </form>
            </div>
        </div>
    </div>

       
</div>    
@endsection