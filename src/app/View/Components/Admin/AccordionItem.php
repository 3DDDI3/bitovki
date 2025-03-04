<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class AccordionItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public ?string $id = null,
        public ?string $blockId = null,
        public ?string $blockTypeId = null,
        public ?string $pageId = null,
        public ?string $header = null,
        public ?string $style = null,
        public bool $isDeletable = false,
        public bool $isEditableHeader = false,
        public ?string $headerName = null,
        public ?string $headerValue = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.accordion-item');
    }
}
