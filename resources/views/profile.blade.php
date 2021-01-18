@extends('master')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <a href="/">Go back</a>
            <h2>{{ $user->name }}</h2>
            <h3>Email: {{ $user->email }}</h3>
            <br><br>
        </div>

    </div>
</div>
@endsection