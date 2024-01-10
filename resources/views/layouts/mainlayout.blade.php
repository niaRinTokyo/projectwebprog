<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carent.id | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-light navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Carent.id</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo02">
                    @if (Auth::user())
                        @if (Auth::user()->role_id == 1)
                            <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class="active" @endif>Dashboard</a>
                            <a href="/cars" @if (request()->route()->uri == 'cars' ||
                                    request()->route()->uri == 'car-add' ||
                                    request()->route()->uri == 'car-edit/{slug}' ||
                                    request()->route()->uri == 'car-delete/{slug}') class="active" @endif>Cars</a>
                            <a href="/" @if (request()->route()->uri == '/') class="active" @endif>Car List</a>
                            <a href="/categories" @if (request()->route()->uri == 'categories' ||
                                    request()->route()->uri == 'category-add' ||
                                    request()->route()->uri == 'category-view-delete' ||
                                    request()->route()->uri == 'category-edit/{slug}' ||
                                    request()->route()->uri == 'category-delete/{slug}') class="active" @endif>Categories</a>
                            <a href="/users" @if (request()->route()->uri == 'users' ||
                                    request()->route()->uri == 'registered-user' ||
                                    request()->route()->uri == 'user-detail/{slug}' ||
                                    request()->route()->uri == 'user-ban/{slug}' ||
                                    request()->route()->uri == 'user-view-ban') class="active" @endif>Users</a>
                            <a href="/rent-logs" @if (request()->route()->uri == 'rent-logs') class="active" @endif>Rent
                                Log</a>
                            <a href="/car-return" @if (request()->route()->uri == 'car-return') class="active" @endif>Car
                                Return</a>
                            <a href="/logout">Logout</a>
                        @else
                            <a href="/profile" @if (request()->route()->uri == 'profile') class="active" @endif>Profile</a>
                            <a href="/" @if (request()->route()->uri == '/') class="active" @endif>Car List</a>
                            <a href="/car-rent" @if (request()->route()->uri == 'car-rent') class="active" @endif>Car
                                Rent</a>
                            <a href="/logout">Logout</a>
                        @endif
                    @else
                        <a href="/login">Login</a>
                    @endif
                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
