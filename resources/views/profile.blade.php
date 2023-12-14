@extends('layouts.mainlayout')

@section('title', 'Profile')

@section('content')
    <div class="mt-5">
        <h3>Your Rent Log</h3>
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>
@endsection
