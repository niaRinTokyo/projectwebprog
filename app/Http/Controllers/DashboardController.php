<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\RentLogs;
use App\Models\User;
use App\Models\category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $carcount = Car::count();
        $categorycount = category::count();
        $usercount = User::count();
        $rentlogs = RentLogs::with(['user', 'car'])->get();

        return view('dashboard', ['car_count' => $carcount, 'category_count' => $categorycount, 'user_count' => $usercount, 'rent_logs' => $rentlogs]);
    }
}
