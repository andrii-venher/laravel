<?php

namespace App\Services;

use App\Models\Category;

class Tree
{
    public static function renderTree($tree, $liClass = '', $ulClass = '')
    {
        $html = '';

        $traverse = function ($categories, $liClass) use (&$traverse, &$html, $ulClass) {
            $html .= '<ul class="' . $ulClass . '">';
            foreach ($categories as $category) {
                $html .= '<li class="'. $liClass .'">' . $category->name . '</li>';
                $traverse($category->children, $liClass);
            }
            $html .= '</ul>';
        };

        $traverse($tree, $liClass);

        return $html;
    }

    public static function renderCategoriesTree() 
    {
        $tree = Category::orderBy('name')->get()->toTree();

        $html = '';

        $traverse = function ($categories) use (&$traverse, &$html) {
            $html .= '<ul class="without-bullets">';
            foreach ($categories as $category) {
                $html .= '<li><a  class="link" href="/?category_id=' . $category->id . '">' . $category->name . '</a></li>';
                $traverse($category->children);
            }
            $html .= '</ul>';
        };

        $traverse($tree);

        return $html;
    }
}