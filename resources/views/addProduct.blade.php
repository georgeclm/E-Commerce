@extends('layouts.master')
@section('title', 'Add Product - TokoApp')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container custom-login">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                <h4>Upload Product</h4>
                <form action="/product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name of Product</label>
                        <input type="text" name="productname" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Price of Product</label>
                        <input type="number" name="price" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Category" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Description" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Image</label>
                        <input type="file" name="gallery" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Upload Product</button>
                </form>

            </div>
        </div>
    </div>
@endsection
