@extends('layouts.mainlayout')

@section('title', 'Rent Log')

@section('content')
    <h1>Rent Log List</h1>

    <div class="mt-5">
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
