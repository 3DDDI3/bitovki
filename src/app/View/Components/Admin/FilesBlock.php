<?php

namespace App\View\Components\Admin;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class FilesBlock extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $id = null,
        public $isDeletable = false,
        public $blockTypeId = null,
        public $blockId = null,
        public $pageId = null,
        public $object = null,
        public $accept = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.files-block');
    }
}
