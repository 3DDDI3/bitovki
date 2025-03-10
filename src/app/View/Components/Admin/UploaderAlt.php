<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class UploaderAlt extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public ?string $id = null,
        public bool $isHidden = false,
        public ?string $blockId = null,
        public ?string $accept = null,
        public bool $isMultiple = false,
        public bool $isDeletable = false,
        public ?string $relationship = null,
        public bool $isSingle = false,
        public $object,
        public ?string $header = null,
        public int $width = 0,
        public int $height = 0,
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.uploader-alt');
    }
}
