<?php

  namespace App\Http\Views\Composers;

  use Illuminate\View\View;

  class CustomViewComposer {

    public function compose(View $view) {
      $user = ['name'=>'andrei', 'email'=>'AndreiNegoie@CodeAcademy.com', 'job'=> 'mentor, teacher, ingeneer, freelancer..'];
      $view->with('user',$user);
    }
  }

 ?>
