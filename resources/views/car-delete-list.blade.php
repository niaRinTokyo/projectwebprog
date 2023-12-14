@extends('layouts.mainlayout')

@section('title', 'Deleted Car')

@section('content')
    <h1>Deleted Car List</h1>

    <div class="mt-3 d-flex justify-content-end">
        <a href="/cars" class="btn btn-primary">Back</a>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewDelete as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->car_code }}</td>
                        <td>{{ $item->model }}</td>
                        <td>
                            <a href="/car-restore/{{$item->slug}}">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
