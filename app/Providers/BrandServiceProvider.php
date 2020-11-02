<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\brand;
class BrandServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    // public function boot()
    // {
    //     View::composer('frontEnd.include.footer',function($view){
    //         $view->with('brands',brand::where('publication_status',1)->get()); 
    //     });
    // }
}
