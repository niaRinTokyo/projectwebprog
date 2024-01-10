@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')

    <form action="" method="get" class="mb-4">
        <div class="row">
            <div class="col-12 col-sm-6">
                <select name="category" id="category" class="form-control">
                    <option value="" selected disabled>Select Category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <div class="input-group">
                    <input type="text" name="model" class="form-control" placeholder="Search Car Model">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        @foreach ($cars as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <img src="{{ $item->preview != null ? asset('storage/preview/' . $item->preview) : asset('images/image-not-found.jpg') }}"
                        class="card-img-top" alt="{{ $item->model }}" draggable="false">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->car_code }}</h5>
                        <p class="card-text">{{ $item->model }}</p>
                        <p class="card-text text-end fw-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                            {{ $item->status }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
