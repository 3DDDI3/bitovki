<?php

namespace App\View\Components\Admin;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ButtonWithList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public ?Collection $object = new Collection()
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.button-with-list');
    }
}
