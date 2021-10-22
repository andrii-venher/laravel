<?php

namespace App\Services;

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
}