@extends('master')
@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a href="/" class="btn btn-outline-primary mb-3">Back</a>
                <h2>{{ $tokoprofile[0]->tokoname }}</h2>
                <h3>Address: {{ $tokoprofile[0]->address }}</h3>
                <h3>Website: {{ $tokoprofile[0]->url }}</h3>

            </div>

        </div>
    </div>
@endsection
