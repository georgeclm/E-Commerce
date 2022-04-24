@extends('layouts.master')
@section('title', 'Update Profile - OSSI')

@section('content')

    <div class="container custom-login">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                <h4>Update Profile</h4>
                <form action="{{ route('users.update',$user->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                        placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                        placeholder="Email" required>
                    </div>

                    <button type="submit" class="btn btn-outline-success">Update Profile</button>
                </form>

            </div>
        </div>
    </div>
@endsection
