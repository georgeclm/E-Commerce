@extends('layouts.master')
@section('title', 'Search - TokoApp')

@section('content')
    <div class="container">
        <div class="col-sm-4">
            <a href="#" class="btn btn-outline-secondary">Filter</a>
        </div>
        <div class="text-center">
            <div class="col-md-12">
                <div class="trending-wrapper m-auto">
                    <h2 class="mb-4">Result for Products</h2>
                    <div class="row row-cols-1 row-cols-md-6">
                        @if ($products->count())
                            @foreach ($products as $item)
                                <div class="col mb-4 link-web">
                                    <a href="detail/{{ $item->id }}">
                                        <div class="card h-100 rounded" style="width: 12rem;">
                                            <img src="{{ asset("products/{$item->gallery}") }}" class="card-img-top"
                                                style="width: 12rem; height: 12rem; background-size: cover; background-position: center;">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $item->name }}</h6>
                                                <h5 class="card-text"> $ {{ number_format($item->price) }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else

                    </div>
                    <div class="h4 text-center">No Product Found</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
