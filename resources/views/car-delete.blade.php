@extends('layouts.mainlayout')

@section('title', 'Delete Category')

@section('content')
    <h2>Are You Sure Want to Delete Car {{$car->model}} ?</h2>
    <div class="mt-4">
        <a href="/car-deleted/{{$car->slug}}" class="btn btn-danger me-2">Yes</a>
        <a href="/cars" class="btn btn-primary">Cancel</a>
    </div>
@endsection
