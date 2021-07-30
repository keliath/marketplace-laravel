<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

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
        //booptstrap paginator
        Paginator::useBootstrap();

        //exportar el submenu de categorias a todas las paginas
        View::composer(['*'], function ($view) {
            $menus = \App\Models\Category::with('subcategories')->get();
            $view->with('menus', $menus);
        });
    }
}
