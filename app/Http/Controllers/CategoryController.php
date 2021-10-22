<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Prophecy\Call\Call;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', ['categories' => Category::all()]);
    }

    public function create()
    {
        return view('categories.create', ['categories' => Category::all()]);
    }

    public function store()
    {
        $category = new Category();
        $category->name = request('name');
        if(request('parent_id') > 0) {
            $category->parent_id = request('parent_id');
        }
        $category->save();

        return redirect('/categories');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->forceDelete();

        return redirect('/categories');
    }
}
