@extends('layouts.mainlayout')

@section('title', 'Users')

@section('content')
    <h1>User List</h1>

    <div class="mt-3 d-flex justify-content-end">
        <a href="/registered-user" class="btn btn-primary me-2">New Registered User</a>
        <a href="/user-view-ban" class="btn btn-danger">View Banned User</a>
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
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
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
                            <a href="/user-detail/{{$item->slug}}">Detail</a>
                            <a href="/user-ban/{{$item->slug}}">Ban User</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
