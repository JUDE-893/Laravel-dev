<?php

namespace App\Http\Views\Composers;
use Illuminate\View\View;
use App\Models\Post;

class PostesComposer {

  public function compose(View $view) {

    $posts = Post::with(['user' => function($q){
      $q->select('id',"name");
    }])->get();
    $view->with('posts',$posts);
  }
}

 ?>
