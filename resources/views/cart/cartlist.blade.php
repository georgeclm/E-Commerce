<?php
use App\Http\Controllers\CartController;

if (Auth::user()) {
$total = CartController::cartItem();
$value = CartController::hasCart();
}
?>
@extends('layouts.master')
@section('title', 'Your Cart - OSSI')
@section('content')

    <div class="container">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                @if ($value == 'no')
                    <h2 class="mb-3">Your Cart</h2>
                    <a class="btn btn-success" href="/ordernow">Order Now</a> <br><br>

                    @foreach ($products as $item)
                        <div class="row searched-item cart-list-divider">
                            <div class="col-sm-3">
                                <a href="detail/{{ $item->id }}">
                                    <img class="trending-image" src="{{ asset("storage/product/{$item->gallery}") }}">
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <div class="">
                                    <h2>{{ $item->name }}</h2>
                                    <h5>{{ $item->description }}</h5>
                                    <h5>Rp. {{ number_format($item->price) }}</h5>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <a href="/removecart/{{ $item->cart_id }}" class="btn btn-warning">Remove from Cart</a>
                            </div>
                        </div>
                    @endforeach

                    @if ($total > 4)
                        <a class="btn btn-success" href="/ordernow">Order Now</a> <br><br>
                    @endif
                @else
                    <div class="d-grid gap-2 col-5 mx-auto text-center">
                        <br><br>
                        <h2 class="mb-3 fs-1">Cart is empty </h2>
                        <a class="btn btn-outline-primary btn-lg" href="/">Start Shopping</a>
                    </div>

                @endif


            </div>
        </div>
    </div>

@endsection
