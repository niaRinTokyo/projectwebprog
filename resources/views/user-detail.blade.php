@extends('layouts.mainlayout')

@section('title', 'Detail User')

@section('content')
    <h1>Detail User</h1>

    @if ($user->status == 'inactive')
        <div class="mt-3 d-flex justify-content-end">
            <a href="/registered-user" class="btn btn-primary">Back</a>
        </div>
    @else
    <div class="mt-3 d-flex justify-content-end">
        <a href="/users" class="btn btn-primary">Back</a>
    </div>
    @endif

    <div class="my-3 w-50">
        <div class="mb-2">
            <label for="" class="form-label">Username</label>
            <input type="text" class="form-control" readonly value="{{$user->username}}">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Phone</label>
            <input type="text" class="form-control" readonly value="{{$user->phone}}">
        </div>
        <div class="mb-2">
            <label for="" class="form-label">Address</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control" style="resize: none">{{ $user->address }}</textarea>
        </div>
        <div class="mb-4">
            <label for="" class="form-label">Status</label>
            <input type="text" class="form-control" readonly value="{{$user->status}}">
        </div>
    </div>

    <div class="mt-3">
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
    </div>
    <div class="mt-3 d-flex justify-content-end">
        @if ($user->status == 'inactive')
            <a href="/user-approve/{{$user->slug}}" class="btn btn-info me-2">Aprrove User</a>
        @endif
    </div>

    <div class="mt-5">
        <h3>User Rent Log</h3>
        <x-rent-log-table :rentlog='$rent_logs'/>
    </div>
@endsection
