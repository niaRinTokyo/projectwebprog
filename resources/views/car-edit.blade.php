@extends('layouts.mainlayout')

@section('title', 'Edit Car')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <h1>Edit Car</h1>

    <div class="mt-3 w-50">
        <form action="/car-edit/{{ $car->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="car_code" id="code" class="form-control" placeholder="Car Code"
                    value="{{ $car->car_code }}">
            </div>
            <div class="mb-2">
                <label for="model" class="form-label">Model</label>
                <input type="text" name="model" id="model" class="form-control" placeholder="Car Model"
                    value="{{ $car->model }}">
            </div>
            <div class="mb-2">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-2">
                <label for="currentImage" class="form-label" style="display:block">Current Image</label>
                @if ($car->preview != '')
                    <img src="{{ asset('storage/preview/' . $car->preview) }}" alt="" width="300px">
                @else
                    <img src="{{ asset('images/image-not-found.jpg') }}" alt="" width="300px">
                @endif
            </div>
            <div class="mb-2">
                <label for="category" class="form-label">Category</label>
                <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label for="currentCategory" class="form-label">Current Category</label>
                <ul>
                    @foreach ($car->categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-2">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>

    <div class="mt-3 d-flex justify-content-end">
        <a href="/cars" class="btn btn-primary">Back</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
