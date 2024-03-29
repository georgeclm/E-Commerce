@extends('layouts.master')
@section('title', "{$product->name} - OSSI")
@section('content')
    <br>
    <div class="container" width="65%">
        <div class="row">
            <div class="col-sm-6 m-auto text-center">
                <img class="detail-img" src="{{ asset("storage/product/{$product['gallery']}") }}" alt="">
            </div>
            <div class="col-sm-6">
                <a href="/" class="btn btn-outline-danger">Go back</a>
                <h2>{{ $product->name }}</h2>
                <h3>Price: Rp. {{ $product->price }}</h3>
                <h4>Description: {{ $product->description }}</h4>
                <h4>Category: {{ $product->category }}</h4>
                <br><br>
                @if ($product->user_id != auth()->id())
                    <form action="/add_to_cart" method="POST">
                        @csrf
                        <!--This input hidden to take the product id that is going to cart-->
                        <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                        <button class="btn btn-primary">Add to cart</button><br><br>

                    </form>
                    <form action='/buynow' method="POST">
                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                        <button class="btn btn-success">Buy Now</button>
                    </form>
                @else
                    <a href='{{ route('product.edit', $product->id) }}' class="btn btn-primary">Edit Product</a><br><br>
                @endif

            </div>

        </div>
    </div>
@endsection
