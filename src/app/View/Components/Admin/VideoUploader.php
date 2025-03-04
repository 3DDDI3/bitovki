<?php

namespace App\View\Components\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class VideoUploader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public ?string $id = null,
        public ?string $path = null,
        public ?string $embed = null,
        public ?Model $object = new Model(),
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.video-uploader');
    }
}
