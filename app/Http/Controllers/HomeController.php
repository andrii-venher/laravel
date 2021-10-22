<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', ['categoryTree' => $this->tree()]);
    }

    private function tree()
    {
        $tree = Category::all()->toTree();

        $html = '';

        $traverse = function ($categories) use (&$traverse, &$html) {
            $html .= '<ul>';
            foreach ($categories as $category) {
                $html .= '<li>' . $category->name . '</li>';
                $traverse($category->children);
            }
            $html .= '</ul>';
        };

        $traverse($tree);

        return $html;
    }
}
