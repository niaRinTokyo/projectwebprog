@extends('layouts.mainlayout')

@section('title', 'Profile')

@section('content')
    <div class="mt-5">
        <h3>Your Rent Log</h3>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <x-rent-log-table :rentlog='$rent_logs'/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
