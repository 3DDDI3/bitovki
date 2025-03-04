<?php

namespace App\View\Components\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Uploader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public ?string $id = null,
        public ?string $imageId = null,
        public bool $isMultiple = false,
        public ?string $accept = null,
        public ?Model $object = new Model(),
        public ?string $header = null,
        public bool $isDeletable = false,
        public bool $isHidden = false,
        public ?string $path = null,
        public ?string $pathName = null,
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
        return view('components.admin.uploader');
    }
}
