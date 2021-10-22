<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\Tree;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = null;

        if(request('category_id') > 0) {
            $subCategoriesIds = Category::descendantsOf(request('category_id'))->pluck('id')->toArray();
            $subCategoriesIds[] = request('category_id');
            $products = Product::whereIn('category_id', $subCategoriesIds)->orderBy('id')->get();
        }
        else {
            $products = Product::all();
        }
        

        return view('home.index', [
            'categoryTree' => Tree::renderCategoriesTree(),
            'products' => $products
        ]);
    }
}
