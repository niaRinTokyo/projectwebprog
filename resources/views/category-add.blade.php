@extends('layouts.mainlayout')

@section('title', 'Add Category')

@section('content')
    <h1>Add New Category</h1>

    <div class="mt-3 w-50">
        <form action="category-add" method="post">
            @csrf
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Category Name">
            </div>
            <div class="mt-2">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>

    <div class="mt-3 d-flex justify-content-end">
        <a href="categories" class="btn btn-primary">Back</a>
    </div>

    @if ($errors->any())
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif
@endsection
