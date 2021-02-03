@extends('master')
@section('content')
    <div class="container">
        <div class="col-sm-4">
            <a href="#" class="btn btn-outline-secondary">Filter</a>
        </div>
        <div class="text-center">
            <div class="col-md-12">
                <div class="trending-wrapper m-auto">
                    <h2 class="text-center text-primary mb-4">Result for Products</h2>
                    @foreach ($products as $item)
                        <div class="searched-item link-web">
                            <a href="detail/{{ $item['id'] }}">
                                <img class="trending-image-search" src="{{ $item['gallery'] }}">
                                <div class="text-center mt-2">
                                    <h3>{{ $item['name'] }}</h3>
                                    <h5>{{ $item['description'] }}</h5>

                                </div>
                            </a>
                        </div>
                        <br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
