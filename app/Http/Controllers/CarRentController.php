<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;
use App\Models\RentLogs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CarRentController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        $cars = Car::all();
        return view('car-rent', ['users' => $users, 'cars' => $cars]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(14)->toDateString();

        $car = Car::findOrFail($request->car_id)->only('status');

        if ($car['status'] != 'in stock') {
            Session::flash('message', 'Cannot rent, the car is not available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('car-rent');
        } else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($count >= 3) {
                Session::flash('message', 'Cannot rent, user has reach the limit to rent a car');
                Session::flash('alert-class', 'alert-danger');
                return redirect('car-rent');
            } else {
                try {
                    DB::beginTransaction();

                    RentLogs::create($request->all());

                    $car = Car::findOrFail($request->car_id);
                    $car->status = 'not available';
                    $car->save();
                    DB::commit();

                    Session::flash('message', 'Rent car success!!');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('car-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function returnCar()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $cars = Car::all();
        return view('return-car', ['users' => $users, 'cars' => $cars]);
    }

    public function saveReturnCar(Request $request)
    {
        $rent = RentLogs::where('user_id', $request->user_id)->where('car_id', $request->car_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        if ($countData == 1) {
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            try {
                DB::beginTransaction();

                $car = Car::findOrFail($request->car_id);
                $car->status = 'in stock';
                $car->save();
                DB::commit();

                Session::flash('message', 'The Car is Returned Successfully');
                Session::flash('alert-class', 'alert-success');
                return redirect('car-return');
            } catch (\Throwable $th) {
                DB::rollBack();
            }
        } else {
            Session::flash('message', 'There is error in process');
            Session::flash('alert-class', 'alert-danger');
            return redirect('car-return');
        }
    }
}
