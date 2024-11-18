<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TagComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
      return <<<'blade'
    <div class="alert alert-success" role="alert" style="max-width: 410px;position: absolute; bottom: 0; right: 0;margin:1%">
        <h4 class="alert-heading">Protect Our Trees!</h4>
        <p>Trees are essential for climate regulation, oxygen production, and biodiversity, yet they face threats from deforestation and climate change. Protecting them is vital for the health of our planet and future generations.</p>
        <hr>
        <p class="mb-0" style="white-space:nowrap">Learn More and Take Action at WWF at <a href="https://www.worldwildlife.org/" target="_parent">www.worldwildlife.org</a></p>
    </div>
blade;
    }
}
