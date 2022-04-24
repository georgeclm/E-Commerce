@extends('layouts.master')
@section('title', 'Edit Product - OSSI')
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
                <h4>Edit Product</h4>
                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name of Product</label>
                        <input type="text" value="{{ $product->name }}" name="productname" class="form-control"
                            placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Price of Product</label>
                        <input type="number" value="{{ $product->price }}" name="price" class="form-control"
                            placeholder="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category</label>
                        <input type="text" value="{{ $product->category }}" name="category" class="form-control"
                            placeholder="Category" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Description</label>
                        <input type="text" value="{{ $product->description }}" name="description" class="form-control"
                            placeholder="Description" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Image</label>
                        <input type="file" name="gallery" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-outline-primary">Edit Product</button>
                </form>

            </div>
        </div>
    </div>
@endsection
