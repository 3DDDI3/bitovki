<?php

namespace App\View\Components\Template\Blocks;

use Illuminate\View\Component;

class Medication extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public int $id,
        public ?string $title = null,
        public ?string $subtitle = null,
        public ?string $image = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.template.blocks.medication');
    }
}
