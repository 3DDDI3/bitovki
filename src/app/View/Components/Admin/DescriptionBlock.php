<?php

namespace App\View\Components\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class DescriptionBlock extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public ?Model $object = new Model()) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.description-block');
    }
}
