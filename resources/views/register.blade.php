@extends('master')
@section('content')

<div class="container custom-login">
    <div class="row justify-content-center">
        <div class="col-sm-4 col-sm-offset-4">
            <h1>Create Your Acount</h1>
            <form action="register" method="POST">
            @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"  placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm</label>
                    <input type="password" name="confirmpassword" class="form-control" id="exampleInputPassword1"  placeholder="Confirm" required>
                </div>
                <button type="submit" class="btn btn-outline-success">Register</button>
            </form>

        </div>
    </div>
</div>
@endsection