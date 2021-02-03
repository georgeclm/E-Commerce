@extends('master')
@section('content')
    <?php
    use App\Http\Controllers\ProductController;
    if (Session::has('user')) {
    $total = ProductController::cartItem();
    }
    ?>
    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h2>Your Cart</h2>
                <a class="btn btn-success" href="ordernow">Order Now</a> <br><br>
                @foreach ($products as $item)
                    <div class="row searched-item cart-list-divider">
                        <div class="col-sm-3">
                            <a href="detail/{{ $item->id }}">
                                <img class="trending-image" src="{{ $item->gallery }}">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div class="">
                                <h2>{{ $item->name }}</h2>
                                <h5>{{ $item->description }}</h5>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <a href="/removecart/{{ $item->cart_id }}" class="btn btn-warning">Remove from Cart</a>
                        </div>
                    </div>
                @endforeach
                @if ($total > 3)
                    <a class="btn btn-success" href="ordernow">Order Now</a> <br><br>
                @endif

            </div>
        </div>
    </div>

@endsection
