@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <h1>Car List</h1>

    <div class="my-3 d-flex justify-content-end">
        <a href="car-add" class="btn btn-primary me-2">Add Data</a>
        <a href="car-view-delete" class="btn btn-danger">View Deleted Data</a>
    </div>
    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-3">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Car Code</th>
                    <th>Model</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->car_code }}</td>
                        <td>{{ $item->model }}</td>
                        <td>
                            @foreach ($item->categories as $category)
                                {{ $category->name }} <br>
                            @endforeach
                        </td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="/car-edit/{{$item->slug}}">Edit</a>
                            <a href="/car-delete/{{$item->slug}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
