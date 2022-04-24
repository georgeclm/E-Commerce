<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\tokoController;
if (Auth::user()) {
$value = tokoController::hasProduct();
}
?>
@extends('layouts.master')
@section('title', 'Toko Profile - OSSI')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a href="/" class="btn btn-outline-primary mb-3">Back</a>
                <h2>{{ $toko->tokoname }}</h2>
                <h3>Address: {{ $toko->address }}</h3>
                <h3>Website: <a href="{{  '//' . $toko->url }}" target="_blank">{{ $toko->url }}</a></h3>
                <h3>Total Sales: Rp. {{ number_format($toko->balance) }}</h3>
            </div>
            <div class="col-sm-6 mt-auto">
                <a href="{{ route('tokoProfile.edit',$toko->id) }}" class="btn btn-outline-primary mb-3">Edit Toko Profile</a>
                <a href="/product/create" class="btn btn-outline-success mb-3">Add Product</a>
                <a href="{{ route('purchases') }}" class="btn btn-outline-primary mb-3">Check Purchase Order</a>
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
                                    <a href="{{ route('product.detail',$item['id']) }}">
                                        <div class="card h-100 rounded" style="width: 12rem;">
                                            <img src="{{ asset("storage/product/{$item['gallery']}") }}" class="card-img-top"
                                                style="width: 12rem;
                                                                                                                                        height: 12rem;
                                                                                                                                        background-size: cover;
                                                                                                                                        background-position: center;">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $item['name'] }}</h6>
                                                <h5 class="card-text"> Rp. {{ number_format($item->price) }}</h5>

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
