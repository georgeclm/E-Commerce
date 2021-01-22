@extends('master')
@section('content')

<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <h1>Create Your Acount</h1>
            <form action="register" method="POST">
            @csrf
            <div class="form-group">
                <!-- add name the email and the password to input to database-->
                <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Username" required>
            </div>
            <div class="form-group">
                <!-- add name the email and the password to input to database-->
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email address" required>
            </div>
            <div class="form-group">
                <input type="password" name="password"class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <p>Password didn't match please try again</p>
            <div class="form-group">
                <input type="password" name="confirmpassword"class="form-control" id="exampleInputPassword1" placeholder="Confirm" required>
            </div>
                <button type="submit" class="btn btn-default">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection