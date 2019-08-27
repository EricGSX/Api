<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        \View::composer(['layout.sidebar'],function($view){
            $action = \Route::current()->getActionName();
            list($class, $method) = explode('@', $action);
            $class = substr(strrchr($class,'\\'),1);
            $view->with('controllerName',$class);
            $view->with('actionName',$method);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
