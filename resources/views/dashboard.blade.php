@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
    <h1>Welcome, {{Auth::user()->username}}</h1>

    <div class="row mt-5">
        <div class="col-lg-4">
            <div class="card-data car">
                <div class="row align-items-center">
                    <div class="col-6 text-center"><i class="bi bi-car-front-fill"></i></div>
                    <div class="col-6 text-end">
                        <div class="card-desc">Cars</div>
                        <div class="card-count">{{$car_count}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data category">
                <div class="row align-items-center">
                    <div class="col-6 text-center"><i class="bi bi-list-task"></i></div>
                    <div class="col-6 text-end">
                        <div class="card-desc">Categories</div>
                        <div class="card-count">{{$category_count}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data user">
                <div class="row align-items-center">
                    <div class="col-6 text-center"><i class="bi bi-people-fill"></i></div>
                    <div class="col-6 text-end">
                        <div class="card-desc">Users</div>
                        <div class="card-count">{{$user_count}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2 class="mb-4">#Rent Log</h2>
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
