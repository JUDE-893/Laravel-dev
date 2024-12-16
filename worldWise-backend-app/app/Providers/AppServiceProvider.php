<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      //SHARING DATA WITH MULTIPLE VIEWS

        // ------using the Fasade class-------
        /*
          - the facade class way make data globally accessed by the all viewin the App

        $user = ['name'=>'andrei', 'email'=>'AndreiNegoie@CodeAcademy.com', 'job'=> 'mentor, teacher, ingeneer, freelancer..'];
        View::share(compact('user'));*/

        // ------using composer------
        /*
          - Composer is a common use to pass data and logic to multiple views.
          - composers are useful to perform nessessary operation (logic) to prepare data before passing to it iews like fetching data from database or external api

        view()->composer(["page",'log','signup'], function($view){
           $user = ['name'=>'andrei', 'email'=>'AndreiNegoie@CodeAcademy.com', 'job'=> 'mentor, teacher, ingeneer, freelancer..'];
           $view->with('user',$user);
        });*/

    }
}
