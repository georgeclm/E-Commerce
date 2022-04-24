@extends('layouts.master')
@section('title', 'Create Toko - OSSI')

@section('content')

    <div class="container custom-login">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                <h4>Create Store</h4>
                <form action="/toko" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Store Name</label>
                        <input type="text" name="tokoname" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Store Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Store Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Domicili" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Store Link</label>
                        <input type="text" name="url" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Website" required>
                    </div>

                    <button type="submit" class="btn btn-outline-success">Create Store</button>
                </form>

            </div>
        </div>
    </div>
@endsection
