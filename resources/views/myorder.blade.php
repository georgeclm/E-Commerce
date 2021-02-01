@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            @if($orders == [])
            <h2>My Orders</h2>
            @foreach($orders as $item)
            <div class="row searched-item cart-list-divider">
                <div class="col-sm-3">
                    <a href="detail/{{ $item->id }}">
                        <img class="trending-image" src="{{ $item->gallery }}" >
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
            <div class="container">
            <h2>No Order Yet</h2>
            <br>
            <a href="cartlist" class="btn btn-outline-secondary">Go to Cart</a>
            </div>
            @endif

        </div>
    </div>
</div>

@endsection 