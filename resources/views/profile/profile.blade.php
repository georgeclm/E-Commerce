@extends('layouts.master')
@section('title', 'Profile - OSSI')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a href="/" class="btn btn-outline-primary mb-3">Back</a>
                <h2>{{ $user->name }}</h2>
                <h3>Email: {{ $user->email }}</h3>
                <br><br>
            </div>
            <div class="col-sm-6 mt-auto">
                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-outline-success mb-3">Edit Profile</a>
            </div>
        </div>
    </div>
@endsection
