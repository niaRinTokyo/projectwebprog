@extends('layouts.mainlayout')

@section('title', 'Banned Users')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Banned User List</h1>
            <div class="d-flex">
                <a href="/users" class="btn btn-primary">Back</a>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

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
                    @forelse ($viewBan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <a href="/user-restore/{{$item->slug}}" class="btn btn-success btn-sm">Restore</a>
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
