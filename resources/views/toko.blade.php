@extends('master')
@section('content')

<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <h4>Create Store</h4>

            <form action="/toko" method="POST">
            @csrf

                <div class="form-group">
                    <!-- add name the email and the password to input to database-->
                    <label for="exampleInputEmail1">Store Name</label>
                    <input type="text" name="tokoname" class="form-control" id="exampleInputEmail1" placeholder="Store Name" required>
                </div>
                <div class="form-group">
                    <!-- add name the email and the password to input to database-->
                    <label for="exampleInputEmail1">Store Address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Domicili" required>
                </div>
                <div class="form-group">
                    <!-- add name the email and the password to input to database-->
                    <label for="exampleInputEmail1">Store Link</label>
                    <input type="text" name="url" class="form-control" id="exampleInputEmail1" placeholder="Website" required>
                </div>

                <button type="submit" class="btn btn-default">Create Store</button>
            </form>
        </div>
    </div>
</div>
@endsection