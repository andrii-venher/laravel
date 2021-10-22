<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\Tree;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', ['categoryTree' => Tree::renderTree(Category::all()->toTree(), 'button-link', 'without-bullets')]);
    }
}
