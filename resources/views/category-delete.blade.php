@extends('layouts.mainlayout')

@section('title', 'Delete Category')

@section('content')
    <h2>Are You Sure Want to Delete Category {{$category->name}} ?</h2>
    <div class="mt-4">
        <a href="/category-deleted/{{$category->slug}}" class="btn btn-danger me-2">Yes</a>
        <a href="/categories" class="btn btn-primary">Cancel</a>
    </div>
@endsection
