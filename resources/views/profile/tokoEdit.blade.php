@extends('layouts.master')
@section('title', 'Update Toko - OSSI')

@section('content')

    <div class="container custom-login">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                <h4>Update Store</h4>
                <form action="{{ route('tokoProfile.update', $toko->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Store Name</label>
                        <input type="text" name="tokoname" class="form-control" value="{{ $toko->tokoname }}"
                        placeholder="Store Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Store Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $toko->address }}"
                        placeholder="Domicili" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Store Link</label>
                        <input type="text" name="url" class="form-control" value="{{ $toko->url }}"
                        placeholder="Website" required>
                    </div>

                    <button type="submit" class="btn btn-outline-success">Update Store</button>
                </form>

            </div>
        </div>
    </div>
@endsection
