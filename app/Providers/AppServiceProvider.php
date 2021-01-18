<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Model\{Tag, Category, Thread};
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('tags', Tag::all());
        View::share('categories', Category::all());
        View::share('tag_thread', Tag::withCount('threads')->get());
        View::share('all_thread', Thread::all());
    }
}
