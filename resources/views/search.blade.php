@extends('master')
@section('content')
<div class="custom-product">
<br>
    <div class="col-sm-4">
        <a href="#">Filter</a>
    </div>
    <div class="col-sm-4">
        <div class="trending-wrapper">
            <h4 class="text-center">Result for Products</h4>
            @foreach($products as $item)
            <div class="searched-item link-web">
                <a href="detail/{{ $item['id'] }}">
                    <img class="trending-image-search" src="{{ $item['gallery'] }}" >
                        <div class="text-center">
                            <h2>{{ $item['name'] }}</h2>
                            <h5>{{ $item['description'] }}</h5>

                        </div>
                </a>
            </div>
            <br><br>
                @endforeach
        </div>
    </div>
</div>
@endsection