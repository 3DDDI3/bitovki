<?php

namespace App\View\Components\Template\Blocks;

use Illuminate\View\Component;

class NewsAlt extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public ?string $id = null,
        public ?string $date = null,
        public ?string $title = null,
        public ?string $image = null,
        public ?string $url = null,
        public ?string $user = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.template.blocks.news-alt');
    }
}
