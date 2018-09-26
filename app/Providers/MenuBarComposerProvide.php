<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuBarComposerProvide extends ServiceProvider
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
        $this->composeMenuBar();
    }

    public function composeMenuBar(){
        view()->composer('includes.frontend.header','App\Http\Composers\MenuBar');
    }
}
