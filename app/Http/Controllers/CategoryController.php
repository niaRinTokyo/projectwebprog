<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = category::all();
        return view('category', ['categories' => $categories]);
    }

    public function add() {
        return view('category-add');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);
        $category = category::create($request->all());
        return redirect('categories')->with('status', 'Category Added Successfully');
    }

    public function edit($slug) {
        $category = category::where('slug', $slug)->first();
        return view('category-edit', ['category' => $category]);
    }

    public function update(Request $request, $slug){
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);

        $category = category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Category Updated Successfully');
    }

    public function delete($slug){
        $category = category::where('slug', $slug)->first();
        return view('category-delete', ['category' => $category]);
    }

    public function deleted($slug) {
        $category = category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Category Deleted Successfully');
    }

    public function viewDelete() {
        $viewDelete = category::onlyTrashed()->get();
        return view('category-delete-list', ['viewDelete' => $viewDelete]);
    }

    public function restore($slug) {
        $category = category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Category Restored Successfully');
    }
}
