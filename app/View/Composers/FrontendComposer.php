<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Categories;

class FrontendComposer
{
    public function compose(View $view)
    {
        $categories = Categories::all();
        $view->with('categories', $categories);
    }
}
