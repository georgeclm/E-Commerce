<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\tokoController;
if (Session::has('user')) {
$value = tokoController::hasProduct();
}
?>
@extends('master')
@section('title', 'Toko Profile - TokoApp')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a href="/" class="btn btn-outline-primary mb-3">Back</a>
                <h2>{{ $tokoprofile[0]->tokoname }}</h2>
                <h3>Address: {{ $tokoprofile[0]->address }}</h3>
                <h3>Website: {{ $tokoprofile[0]->url }}</h3>
            </div>
            <div class="col-sm-6 mt-auto">
                <a href="/product/create" class="btn btn-outline-success mb-3">Add Product</a>
            </div>
        </div>
        <div class="row">
            <div class="container trending-wrapper mb-5">
                <div class="col-md-12 text-center">
                    @if ($value == 'no')
                        <h3 class='mb-4'>Your Products</h3>
                        <div class="row row-cols-1 row-cols-md-6">
                            @foreach ($products as $item)
                                <div class="col mb-4 link-web">
                                    <a href="detail/{{ $item['id'] }}">
                                        <div class="card h-100 rounded" style="width: 12rem;">
                                            <img src="{{ asset("products/{$item['gallery']}") }}" class="card-img-top"
                                                style="width: 12rem;
                                                                                                                                height: 12rem;
                                                                                                                                background-size: cover;
                                                                                                                                background-position: center;">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $item['name'] }}</h6>
                                                <h5 class="card-text"> $ {{ $item['price'] }}</h5>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <h3 class="">Your Toko didn't have any Product yet</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
