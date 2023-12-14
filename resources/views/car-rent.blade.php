@extends('layouts.mainlayout')

@section('title', 'Car Rent')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="col-12 col-md-6 offset-md-2 col-lg-6 offset-md-3">
        <h1 class="mb-3">Car Rent Form</h1>

        <div class="mt-3">
            @if (session('message'))
                <div class="alert {{session('alert-class')}}">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <form action="car-rent" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
            <input type="text" class="form-control" readonly value="{{$users->username}}">
            </div>
            <input type="hidden" name="user_id" value="{{ $users->id }}">
            <div class="mb-3">
                <label for="car" class="form-label">Car</label>
                <select name="car_id" id="car" class="form-control inputbox">
                    <option value="">Select Car</option>
                    @foreach ($cars as $item)
                        <option value="{{ $item->id }}">{{ $item->model }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.inputbox').select2();
        });
    </script>
@endsection
