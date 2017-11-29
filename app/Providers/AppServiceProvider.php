<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Post;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.newPost',function($view){
            $new= Post::orderBy('id','desc')->take(4)->get();
            $view->with('new',$new);
        });
        \Carbon\Carbon::setLocale(config('app.locale'));
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
