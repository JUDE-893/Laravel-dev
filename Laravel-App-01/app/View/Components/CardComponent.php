<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $data;
    public function __construct($data=null)
    {
      $this->data = $data;
    }

    public function classToggler($attr){
      if ($attr['class'] === "walo") {
        return "spmething";
      };return "walo";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-component',['data'=>$this->data]);
    }
}
