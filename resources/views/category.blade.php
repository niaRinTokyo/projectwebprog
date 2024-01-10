@extends('layouts.mainlayout')

@section('title', 'Category')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Category List</h1>
            <div class="d-flex">
                <a href="category-add" class="btn btn-primary me-2">Add Data</a>
                <a href="category-view-delete" class="btn btn-danger">View Deleted Data</a>
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
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="category-edit/{{$item->slug}}" class="btn btn-info btn-sm me-1">Edit</a>
                                <a href="category-delete/{{$item->slug}}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
