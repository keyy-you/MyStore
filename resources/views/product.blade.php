@extends('layouts.app')

@section('content')
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    
    <a href="{{url('product/create')}}" class="btn btn-outline-dark float-md-right"><i class="fa fa-plus" aria-hidden="true"></i>
    CREATE</a>
 
    
    <table class="table table-hover table-bordered">
      <tr class="bg-light">
        <th class="text-md-center">NO</th>
        <th class="text-md-center">Product</th>
        <th class="text-md-center">Price</th>
        <th class="text-md-center">Product Slug</th>
        <th width="280px" class="text-md-center">Action</th>
      </tr>
      @forelse ($product as $pr)
      <tr>
          <td class="text-md-center">{{ $loop->iteration }}</td>
          <td class="text-md-center">{{ $pr->product_title }}</td>
          <td class="text-md-center">{{ $pr->product_price }}</td> 
          <td class="text-md-center">{{ $pr->product_slug }}</td>
          <td class="text-md-center">
            <form action="{{ route('product.destroy', $pr->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('product.show', $pr->id) }}" class="btn btn-dark">
              
              <i class="fa fa-info"></i>
              </a>
              <a href="{{ url('/product/edit', $pr->product_slug) }}" class="btn btn-warning">
              
              Edit
              </a>
              <button type="submit" class="btn btn-danger">
              <i class="fas fa-trash"></i></button>
            </form>
          </td>
      </tr>    
      @empty
        <tr>
          <td colspan="8" class="text-center">No Data</td>
        </tr>
      @endforelse
    </table>

{{ $product->links() }}

@endsection