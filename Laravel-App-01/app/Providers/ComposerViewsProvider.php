<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Views\Composers\CustomViewComposer;
use App\Http\Views\Composers\TreesComposer;



class ComposerViewsProvider extends ServiceProvider
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
        view()->composer(['page','log','dashboard'], CustomViewComposer::class);
        view()->composer(["page"],TreesComposer::class);
    }
    /**/
}
