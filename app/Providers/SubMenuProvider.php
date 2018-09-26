<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SubMenuProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->composeSubMenu();
    }

    public function composeSubMenu(){
        view()->composer('includes.frontend.sub-header','App\Http\Composers\SubMenuComposer');
    }
}
