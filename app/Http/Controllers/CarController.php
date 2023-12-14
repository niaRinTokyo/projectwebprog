<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\category;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('car', ['cars' => $cars]);
    }

    public function add()
    {
        $categories = category::all();
        return view('car-add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_code' => 'required|unique:cars|max:255',
            'model' => 'required|max:255'
        ]);

        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->model . "-" . now()->timestamp . "." . $extension;
            $request->file('image')->storeAs('preview', $newName);
        }
        $request['preview'] = $newName;
        $car = Car::create($request->all());
        $car->categories()->sync($request->categories);
        return redirect('cars')->with('status', 'Car Added Successfully');
    }

    public function edit($slug)
    {
        $car = Car::where('slug', $slug)->first();
        $categories = category::all();
        return view('car-edit', ['categories' => $categories, 'car' => $car]);
    }

    public function update(Request $request, $slug)
    {
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->model . "-" . now()->timestamp . "." . $extension;
            $request->file('image')->storeAs('preview', $newName);
            $request['preview'] = $newName;
        }

        $car = Car::where('slug', $slug)->first();
        $car->update($request->all());

        if ($request->categories) {
            $car->categories()->sync($request->categories);
        }

        return redirect('cars')->with('status', 'Car Updated Successfully');
    }

    public function delete($slug)
    {
        $car = Car::where('slug', $slug)->first();
        return view('car-delete', ['car' => $car]);
    }

    public function deleted($slug)
    {
        $car = Car::where('slug', $slug)->first();
        $car->delete();
        return redirect('cars')->with('status', 'Car Deleted Successfully');
    }

    public function viewDelete()
    {
        $viewDelete = Car::onlyTrashed()->get();
        return view('car-delete-list', ['viewDelete' => $viewDelete]);
    }

    public function restore($slug)
    {
        $car = Car::withTrashed()->where('slug', $slug)->first();
        $car->restore();
        return redirect('cars')->with('status', 'Car Restored Successfully');
    }
}
