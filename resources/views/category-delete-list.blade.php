@extends('layouts.mainlayout')

@section('title', 'Deleted Category')

@section('content')
    <h1>Deleted Category List</h1>

    <div class="mt-3 d-flex justify-content-end">
        <a href="/categories" class="btn btn-primary">Back</a>
    </div>

    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-3">
        @if ($viewDelete->isEmpty())
            <p class="lead">No deleted categories available.</p>
        @else
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewDelete as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="category-restore/{{$item->slug}}" class="btn btn-success btn-sm">Restore</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
