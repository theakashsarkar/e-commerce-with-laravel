<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use View;
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
        // View::share('key', 'value');
        View::composer('frontEnd.include.header', function($view){
         $view->with('categories',Category::where('publication_staus',1)->get()); 
        });
    }
}
