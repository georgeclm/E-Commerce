@extends('master')
@section('content')

<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="register" method="POST">
            @csrf
            <div class="form-group">
                <!-- add name the email and the password to input to database-->
                <label for="exampleInputEmail1">Username</label>
                <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Username" required>
            </div>
            <div class="form-group">
                <!-- add name the email and the password to input to database-->
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password"class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-default">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection