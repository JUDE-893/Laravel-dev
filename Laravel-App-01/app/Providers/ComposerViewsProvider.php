<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Views\Composers\CustomViewComposer;
use App\Http\Views\Composers\TreesComposer;
use App\Http\Views\Composers\PostesComposer;



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
        view()->composer(["index"],PostesComposer::class);
    }
    /**/
}
