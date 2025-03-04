<?php

namespace App\View\Components\Template\Blocks;

use Illuminate\View\Component;

class SearchBlock extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public ?string $path = null,
        public ?string $time = null,
        public ?string $title = null,
        public ?string $text = null,
        public ?string $href = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.template.blocks.search-block');
    }
}
