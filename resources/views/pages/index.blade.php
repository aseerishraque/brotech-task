@extends('layouts.primary')
@section('title')
    Online Shipping Platform
@endsection
@section('content')
    <h2 class="text-center">
        All Products
        @if(isset($category_name))
            of Category: {{ $category_name }}
        @endif
    </h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/demo.jpg') }}" class="card-img-top img-thumbnail" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <h5>
                        {{ $product->price }}
                    </h5>
                    <p class="card-text">
                        {{ $product->details }}
                    </p>
                    <a href="#" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-6">
            {{ $products->links() }}
        </div>
    </div>
@endsection
