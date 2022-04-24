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
                                    <h5>Buyer: {{ $item->user->name }}</h5>

                                </div>
                            </div>
                            <div class="col-sm-3">
                                @if($item->payment_status == 'Pending')
                                    <a class="btn btn-outline-secondary" href="{{ route('purchases.payment.update',['order'=> $item->id, 'status'=> 'Paid']) }}">Confirm Payment</a>
                                @elseif($item->status == 'Pending')
                                    <a class="btn btn-outline-secondary" href="{{ route('purchases.delivery.update',['order'=> $item->id, 'status'=> 'Delivered']) }}">Product Delivered</a>
                                @elseif($item->status == 'Done')
                                    <button class="btn btn-success" disabled>Done</button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="d-grid gap-2 col-5 mx-auto text-center">
                        <br><br>
                        <h2 class="mb-3 fs-1">No Purchases On Your Product Yet</h2>
                    </div>

                @endif

            </div>
        </div>
    </div>

@endsection
