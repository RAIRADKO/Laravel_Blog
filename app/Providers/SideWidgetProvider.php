<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class SideWidgetProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('front.layout.side-widget', function ($view) {
            //$category = Category::latest()->get();
            $category = Category::withCount(['Articles' => function (Builder $query) {
                $query->where('status', 1);
            }])->latest()->get();

            $view->with('categories', $category);
        });

        View::composer('front.layout.side-widget', function ($view) {
            $posts = Article::orderBy('views', 'desc')->take(3)->get();
            $view->with('popular_posts', $posts);
        });

        View::composer('front.layout.navbar', function ($view) {
            $category = Category::latest()->get();
            $view->with('category_navbar', $category);
        });
    }
}