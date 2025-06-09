<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class CategoryController extends Controller
{
    public function index($slugCategory)
    {
        return view('front.category.index', [
            'articles' => Article::whereHas('Category', function($q) use ($slugCategory) {
                $q->where('slug', $slugCategory);
            })->latest()->paginate(9),
            'category' => $slugCategory
        ]);
    }

    public function allCategory()
    {
        $category = Category::withCount(['Articles' => function (Builder $query) {
                $query->where('status', 1);
            }])->latest()->get();

        return view('front.category.all-category',[
            'category' => $category
        ]);
    }
}
