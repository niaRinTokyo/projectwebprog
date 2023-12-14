@extends('layouts.mainlayout')

@section('title', 'Delete User')

@section('content')
    <h2>Are You Sure Want to Delete User {{$user->username}} ?</h2>
    <div class="mt-4">
        <a href="/user-deleted/{{$user->slug}}" class="btn btn-danger me-2">Yes</a>
        <a href="/users" class="btn btn-primary">Cancel</a>
    </div>
@endsection
