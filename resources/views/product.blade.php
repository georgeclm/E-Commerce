@extends('master')
@section('content')
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
        <li data-bs-target="#carouselExampleDark" data-bs-slide-to="3"></li>
        <li data-bs-target="#carouselExampleDark" data-bs-slide-to="4"></li>
        <li data-bs-target="#carouselExampleDark" data-bs-slide-to="5"></li>
        <li data-bs-target="#carouselExampleDark" data-bs-slide-to="6"></li>
    </ol>
    <div class="carousel-inner">
        @foreach($products as $item)
        <div class="carousel-item {{ $item['id']== 1 ?'active': '' }}" data-bs-interval="10000">
            <a href="detail/{{ $item['id'] }}">
                <div class="text-center">
                    <img src="{{ $item['gallery'] }}" class="slider-img" alt="...">
                </div>
                <div class="carousel-caption d-none d-md-block slider-text">
                    <h5>{{ $item['name'] }}</h5>
                    <p>{{ $item['description'] }}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>
<div class="container trending-wrapper mb-5">
<div class="col-md-12 text-center">
    <h3 class='text-primary mb-4'>Trending Products</h3>
    @foreach($products as $item)
    <div class="trending-item">
        <div class="link-web">
            <a href="detail/{{ $item['id'] }}">
                <img class="trending-image" src="{{ $item['gallery'] }}" >
                <div class="h3">
                    {{ $item['name'] }}
                </div>
            </a>
        </div>
    </div>
    @endforeach

    </div>
</div>
@endsection