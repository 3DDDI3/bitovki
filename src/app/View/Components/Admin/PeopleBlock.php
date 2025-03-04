<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class PeopleBlock extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public ?string $id = null,
        public ?string $header = null,
        public bool $isHidden = false,
        public $blockTypeId = null,
        public $blockId = null,
        public $pageId = null,
        public $object = null,
        public $selectedObject = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.people-block');
    }
}
