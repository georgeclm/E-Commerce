<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\tokoController;
use App\Http\Controllers\UserController;
$total = 0;
if (Session::has('user')) {
$value = tokoController::hasProfile();
$total = CartController::cartItem();
}
$home = UserController::active();
$order = UserController::orderActive();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/logoicon.ico') }}" alt="" width="33" height="33"
                class="d-inline-block align-top mr-5"> TokoApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if ($home) active @endif"
                        aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if ($order) active @endif"
                        href="/myorders">Orders</a>
                </li>
            </ul>
            <div class="col-md-8 text-center">
                <form action="/search" class="d-flex container-fluid">
                    <input class="form-control me-2" name="query" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>

            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                @if (Session::has('user'))
                    <li class="nav-item">
                        <a class="nav-link" href="/cartlist">Cart {{ $total }}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Toko
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if ($value == 'no')
                                <li><a class="dropdown-item" href="/tokoprofile/{{ Session::get('user')['id'] }}">Your
                                        Toko</a></li>
                            @else
                                <li><a class="dropdown-item" href="/toko/create">Create Toko</a></li>
                            @endif
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Session::get('user')['name'] }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/profile/{{ Session::get('user')['id'] }}">Profile</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            <h1>{{ $errors->first() }}</h1>
        </ul>
    </div>
@endif

@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <h1>{!! \Session::get('success') !!}</h1>
        </ul>
    </div>
@endif

<br>
