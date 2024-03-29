@extends('layouts.master')
@section('title', 'My Orders - OSSI')

@section('content')
    <div class="container">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                @if (!empty($orders))
                    <h2 class="mb-4">Purchase History</h2>
                    @foreach ($orders as $item)
                        <div class="row searched-item cart-list-divider">
                            <div class="col-sm-3">
                                <a href="detail/{{ $item->product->id }}">
                                    <img class="trending-image" src="{{ asset("storage/product/{$item->product->gallery}") }}">
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <div class="">
                                    <h2>Name: {{ $item->product->name }}</h2>
                                    <h5>Delivery Status: {{ $item->status }}</h5>
                                    <h5>Address: {{ $item->address }}</h5>
                                    <h5>Payment Status: {{ $item->payment_status }}</h5>
                                    <h5>Payment Method: {{ $item->payment_method }}</h5>

                                </div>
                            </div>
                            <div class="col-sm-3 text-center">
                                @if($item->status == 'Delivered')
                                    <a class="btn btn-outline-success" href="{{ route('purchases.delivery.update',['order'=> $item->id, 'status'=> 'Done']) }}">Received</a>
                                    <br>
                                    You will give Rp. {{ number_format($item->product->price) }} to Seller
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="d-grid gap-2 col-5 mx-auto text-center">
                        <br><br>
                        <h2 class="mb-3 fs-1">Order Is Empty</h2>
                    </div>

                @endif

            </div>
        </div>
    </div>

@endsection
