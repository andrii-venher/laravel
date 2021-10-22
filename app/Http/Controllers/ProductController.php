<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', ['products' => Product::all()]);
    }

    public function create()
    {
        return view('products.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1000',
            'name' => 'required',
            'sku' => 'required',
            'category_id' => 'required'
        ]);

        $request->image->store('images', 'public');

        $product = new Product();
        $product->name = request('name');
        $product->sku = request('sku');
        $product->image = $request->image->hashName();
        $product->category_id = request('category_id');
        $product->save();

        //$request->image->move(public_path('images'), $imageName);

        return redirect('/products');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete('public/images/' . $product->image);
        $product->delete();

        return redirect('/products');
    }
}
