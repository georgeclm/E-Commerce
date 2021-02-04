<?php
use App\Http\Controllers\ProductController;
$total = 0;
if (Session::has('user')) {
$value = ProductController::hasOrder();
}
?>
@extends('master')
@section('content')
    <div class="container">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                @if ($value == 'no')
                    <h2 class="mb-3">My Orders</h2>
                    @foreach ($orders as $item)
                        <div class="row searched-item cart-list-divider">
                            <div class="col-sm-3">
                                <a href="detail/{{ $item->id }}">
                                    <img class="trending-image" src="{{ asset("products/{$item->gallery}") }}">
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <div class="">
                                    <h2>Name: {{ $item->name }}</h2>
                                    <h5>Delivery Status: {{ $item->status }}</h5>
                                    <h5>Address: {{ $item->address }}</h5>
                                    <h5>Payment Status: {{ $item->payment_status }}</h5>
                                    <h5>Paymenent Method: {{ $item->payment_method }}</h5>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="d-grid gap-2 col-5 mx-auto text-center">
                        <br><br>
                        <h2 class="mb-3 fs-1">Order is empty </h2>
                        <a class="btn btn-outline-secondary btn-lg" href="/cartlist"> Go to Cart</a>
                    </div>

                @endif

            </div>
        </div>
    </div>

@endsection
