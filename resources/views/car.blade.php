@extends('layouts.mainlayout')

@section('title', 'Cars')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Car List</h1>
            <div class="d-flex">
                <a href="car-add" class="btn btn-primary me-2">Add Data</a>
                <a href="car-view-delete" class="btn btn-danger">View Deleted Data</a>
            </div>
        </div>

        @if (session('status'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('message') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
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
                    @forelse ($cars as $item)
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
                                <a href="/car-edit/{{$item->slug}}" class="btn btn-info btn-sm me-1">Edit</a>
                                <a href="/car-delete/{{$item->slug}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
