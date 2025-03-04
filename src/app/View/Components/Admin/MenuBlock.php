<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class MenuBlock extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public ?string $blockId = null,
        public ?string $pageId = null,
        public $object = null
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.menu-block');
    }
}
