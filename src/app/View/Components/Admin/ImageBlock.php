<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class ImageBlock extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $id = null,
        public $pageId = null,
        public $blockId = null,
        public $object = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.image-block');
    }
}
