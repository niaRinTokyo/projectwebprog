<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $categories = category::all();

        if($request->category || $request->model) {
            $cars = Car::where('model', 'like', '%'.$request->model.'%')
                        ->orWhereHas('categories', function($q) use($request) {
                            $q->where('categories.id', $request->category);
                        })
                        ->get();
        }
        else {
            $cars = Car::all();
        }

        return view('car-list', ['cars' => $cars, 'categories' => $categories]);
    }
}
