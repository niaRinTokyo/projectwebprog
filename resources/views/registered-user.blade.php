@extends('layouts.mainlayout')

@section('title', 'Registered Users')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>New Register User List</h1>
            <div class="d-flex">
                <a href="/users" class="btn btn-primary me-2">Approved User List</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($registeredUsers as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->username }}</td>
                            <td>
                                @if ($item->phone)
                                    {{ $item->phone }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <a href="/user-detail/{{$item->slug}}" class="btn btn-info btn-sm me-1">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
